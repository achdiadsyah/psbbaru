<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarulang extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        check_login();
        // check_lulus_adm();
        // check_lulus();
        $this->load->model('M_Peserta');
        $this->load->model('M_Filepsb');
    }

	public function index()
    {
        $data = [
            'title'     => 'Daftar Ulang',
            'content'   => 'daftarulang/index'
        ];
        echo $this->template->views($data);
    }

    public function biodata()
    {
        $data = [
            'title'     => 'Kelengkapan Biodata',
            'content'   => 'daftarulang/biodata'
        ];
        echo $this->template->views($data);
    }

    public function berkas()
    {
        $data = [
            'title'     => 'Kelengkapan Berkas',
            'content'   => 'daftarulang/berkas',
            'costum_js'   => 'daftarulang/js-berkas'
        ];
        echo $this->template->views($data);
    }
    
    function ajax_update()
    {
        if ($this->input->is_ajax_request() == true) {

            $nik = $this->input->post('nik');
            $target = $this->input->post('target');
            $namafile = $this->input->post('file_name');

            $data = [
                $target => $namafile,
            ];

            $insert = $this->M_Filepsb->update($nik, $data);
            if ($insert == TRUE) {
                echo json_encode(array("status" => true, "msg" => 'Berhasil Upload File'));
            } else {
                echo json_encode(array("status" => false, "msg" => "Gagal Upload File Ke Database"));
            }
        } else {
            exit('Error');
        }
    }
}
