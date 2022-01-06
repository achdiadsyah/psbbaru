<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarulang extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        check_login();
        check_lulus_adm();
        check_lulus();
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
        check_biodata_ulang();
        $data = [
            'title'     => 'Kelengkapan Biodata',
            'content'   => 'daftarulang/biodata',
            'costum_js'   => 'daftarulang/js-biodata'
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
    
    public function cetak()
    {
        check_berkas_akhir();

        $join    = $this->M_Peserta->get_file($this->session->userdata['nik']);

        $this->load->library('Pdf');
        $data = [
            'title'         => 'Berkas Kelulusan',
            'assetsurl'     => base_url('assets/'),
            'filesurl'      => cdn_file('uploads/'),
            'output'        => $join->row(),
            'ketua_panitia' => psb_detail('ketua_panitia_psb'),
        ];
        $this->load->view('daftarulang/pdf-output', $data);
    }

    public function ajax_get()
    {
        if ($this->input->is_ajax_request() == true) {
            $get = $this->M_Peserta->get($this->session->userdata['id']);

            $data = [
                'checksum'                  => $get->checksum,
                'nik'                       => $get->nik,
                'nama'                      => $get->nama,
                'alamat'                    => $get->alamat,                
                'status_ayah'               => $get->status_ayah,
                'status_ibu'                => $get->status_ibu,
                'nama_wali'                 => $get->nama_wali,                
            ];

            echo json_encode($data);
        } else {
            exit('Error');
        }
    }

    public function ajax_update_file()
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

    public function ajax_update_biodata()
    {
        if ($this->input->is_ajax_request() == true) {
            $checksum = $this->input->post('checksum');

            $this->M_Peserta->update_checksum($checksum, $this->input->post());
            
        } else {
            exit('Error');
        }
    }
}
