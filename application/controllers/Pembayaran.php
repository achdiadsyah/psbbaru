<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        check_login();
        $this->load->model('M_Peserta');
        $this->load->model('M_Pembayaran');
    }

	public function index()
	{
		$data = [
            'title'     => 'Laman Pembayaran',
            'content'   => 'pembayaran/index',
            'costum_js' => 'pembayaran/js'
        ];
        echo $this->template->views($data);
	}

    function ajax_upload()
    {
        $upload_image = $_FILES['file']['name'];
        if ($upload_image != NULL) {
            $config['upload_path']          = './uploads/struk/';
            $config['allowed_types']        = 'jpg|jpeg|png|jfif|gif';
            $config['max_size']             = '15015';
            $config['encrypt_name']         = TRUE;
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('file')){
    
                $namafile = $this->upload->data('file_name');
                
                $config['image_library']='gd2';
                $config['source_image']= './assets/struk/'.$namafile;
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';                            
                $config['new_image']= './assets/struk/'.$namafile;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
    
                    $data = [
                        'nik'       => $this->input->post('nik'),
                        'nominal'   => psb_detail("biaya_psb"),
                        'file_bukti'=> $namafile,
                        'status'    => '1'
                    ];  

                    $insert = $this->M_Pembayaran->insert($data);
                    if ($insert == TRUE) {
                        echo json_encode(array("status" => true, "msg" => "Berhasil Upload Gambar Dan Ke Database"));
                    } else {
                        echo json_encode(array("status" => false, "msg" => "Gagal Upload Gambar Dan Ke Database"));
                    }
                      
            } else {
                echo json_encode(array("status" => false, "msg" => $this->upload->display_errors()));
            }
        } else {
            echo json_encode(array("status" => false, "msg" => "Error"));
        }
    }

    public function get_status($nik)
    {
        if ($this->input->is_ajax_request() == true) {
            $get = $this->M_Pembayaran->get_by_nik($nik);
            $get2 = $this->M_Peserta->get_by_nik($nik)->row();
            if ($get->num_rows() >= 1){
                if ($get2->s_payment == 1){
                    echo json_encode(array('status' => true, 'message' => "Verifikasi Berhasil, Pembayaran di terima <br> <a href='".base_url('biodata')."' class='btn btn-primary'>Lanjut Isi Biodata</a>"));
                } elseif ($get2->s_payment == 2){
                    echo json_encode(array('status' => true, 'message' => "Pembayaran anda di tolak"));
                } else {
                    echo json_encode(array('status' => true, 'message' => "Sudah Upload, Sedang di verifikasi"));
                }
            } else {
                echo json_encode(array('status' => false, 'message' => "Belum Upload"));
            }
        } else {
            exit('Error');
        }
    }
}
