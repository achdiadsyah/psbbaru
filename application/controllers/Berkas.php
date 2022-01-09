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
        $user = $this->M_Peserta->get($this->session->userdata['id']);

        if($user->jalur == "undangan"){
            $data = [
                'title'     => 'Upload File dan Berkas',
                'content'   => 'berkas/undangan',
                'costum_js'   => 'berkas/js'
            ]; 
        } elseif($user->jalur == "reguler") {
            $data = [
                'title'     => 'Upload File dan Berkas',
                'content'   => 'berkas/reguler',
                'costum_js'   => 'berkas/js'
            ]; 
        }
        
        echo $this->template->views($data);
	}

    public function get_status()
    {
        if ($this->input->is_ajax_request() == true) {
            $nik = $this->session->userdata['nik'];
            $get = $this->M_Filepsb->get_by_nik($nik)->row();

            if ($get){
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
        if (check_cetak() == TRUE){
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
        } else {
            echo json_encode(array("status" => "forbiden"));
        }
    }
}
