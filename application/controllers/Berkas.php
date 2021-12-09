<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        check_login();
        check_payment();
        check_biodata();

        $this->load->model('M_Peserta');
        $this->load->model('M_Filepsb');
    }

	public function index()
	{
		$data = [
            'title'     => 'Upload File dan Berkas',
            'content'   => 'berkas/index',
            'costum_js'   => 'berkas/js'
        ];
        echo $this->template->views($data);
	}

    function ajax_upload($target)
    {
        $upload_image = $_FILES['file']['name'];
        $path = './uploads/'.$target;
        if ($upload_image != NULL) {
            $config['upload_path']          = $path;
            $config['allowed_types']        = 'jpg|jpeg|png|jfif|gif';
            $config['max_size']             = '5120';
            $config['encrypt_name']         = TRUE;
            $config['file_ext_tolower']     = TRUE;
            
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('file')){
    
                $namafile = $this->upload->data('file_name');
                
                $config2['image_library']='gd2';
                $config2['source_image']= $path.$namafile;
                $config2['create_thumb']= FALSE;
                $config2['maintain_ratio']= FALSE;
                $config2['quality']= '80%';                            
                if ($target == "pasphoto"){
                    $config2['width']= 300;                            
                    $config2['height']= 400;
                }
                $config2['new_image']= $path.$namafile;
                
                $this->load->library('image_lib');
                
                $this->image_lib->initialize($config2);

                $this->image_lib->resize();

                    $nik = $this->input->post('nik');
                    $data = [
                        $target => $namafile,
                    ];  

                    $insert = $this->M_Filepsb->update($nik, $data);
                    if ($insert == TRUE) {
                        echo json_encode(array("status" => true, "msg" => $this->image_lib->display_errors()));
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

    public function get_status()
    {
        if ($this->input->is_ajax_request() == true) {
            $nik = $this->session->userdata['nik'];
            $get = $this->M_Filepsb->get_by_nik($nik)->row();
            $get2 = $this->M_Peserta->get_by_nik($nik)->row();

            if ($get && $get2){
                echo json_encode($get);
            } else {
                echo json_encode(array('status' => false, 'message' => "Gagal Mendapatkan Data"));
            }
        } else {
            exit('Error');
        }
    }

    public function delete_file()
    {
        $folder = $this->input->post('folder');
        $file = $this->input->post('file');

        $nik = $this->session->userdata['nik'];
        $id = $this->session->userdata['id'];

        $get = $this->M_Filepsb->get_by_nik($nik);
        $path = './uploads/'.$folder.'/'.$file;
        if ($get){
            unlink($path);
            $data = [
                $folder => '',
                'status' => '0'
            ];
            $data2 = [
                's_file' => '0'
            ];
            $this->M_Filepsb->update($nik, $data);
            $this->M_Peserta->update($id, $data2);
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }


    public function test()
    {
        phpinfo();
    }
}
