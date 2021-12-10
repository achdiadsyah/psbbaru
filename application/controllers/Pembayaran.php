<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        check_login();
        $this->load->model('M_Peserta');
        $this->load->model('M_Filepsb');
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
        $nik = $this->input->post('nik');
        if ($upload_image != NULL) {
            $cfg['upload_path']          = './uploads/struk/';
            $cfg['allowed_types']        = 'jpg|jpeg|png|jfif|gif';
            $cfg['max_size']             = '5012';
            $cfg['encrypt_name']         = TRUE;
    
            $this->load->library('upload', $cfg);
    
            if ($this->upload->do_upload('file')){
    
                $namafile = $this->upload->data('file_name');
                
                $config['image_library']='gd2';
                $config['source_image']= './uploads/struk/'.$namafile;
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '100%';
                $config['width']= 1000;
                $config['new_image']= './uploads/struk/'.$namafile;
                $this->load->library('image_lib');
                
                $this->image_lib->initialize($config);

                $this->image_lib->resize();
    
                    $data = [
                        'struk'=> $namafile,
                    ];  
                    $insert = $this->M_Filepsb->update($nik, $data);
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
            $get = $this->M_Filepsb->get_by_nik($nik)->row();

            $get2 = $this->M_Peserta->get_by_nik($nik)->row();
            if ($get->struk == "-"){
                echo json_encode(array('status' => false, 'message' => "Silahkan Upload Struk"));
            } elseif ($get->struk == "undangan.jpg"){
                echo json_encode(array('status' => true, 'message' => "Jalur Undangan, Tidak perlu upload bukti pembayaran"));
            } else {
                if ($get2->s_payment == 1){
                    echo json_encode(array('status' => true, 'message' => "Verifikasi Berhasil, Pembayaran di terima <br> <a href='".base_url('biodata')."' class='btn btn-primary'>Lanjut Isi Biodata</a>"));
                } elseif ($get2->s_payment == 2){
                    echo json_encode(array('status' => true, 'message' => "Pembayaran anda di tolak"));
                } else {
                    echo json_encode(array('status' => true, 'message' => "Sudah Pernah Upload, Menunggu Verifikasi"));
                }
            }
        } else {
            exit('Error');
        }
    }
}
