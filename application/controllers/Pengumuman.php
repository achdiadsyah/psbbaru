<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('M_Peserta');
        $this->load->model('M_Filepsb');
    }

	public function reguler()
	{
        check_akses_pengumuman('reguler');
		$data = [
            'title'     => 'Pengumuman Kelulusan Jalur Reguler',
            'content'   => 'pengumuman/reguler',
            'costum_js' => 'pengumuman/js'
        ];
        echo $this->template->views($data);
	}

    public function undangan()
	{
        check_akses_pengumuman('undangan');
		$data = [
            'title'     => 'Pengumuman Kelulusan Jalur Undangan',
            'content'   => 'pengumuman/undangan',
            'costum_js' => 'pengumuman/js'
        ];
        echo $this->template->views($data);
	}

    public function adm()
	{
        check_akses_pengumuman('undangan');
		$data = [
            'title'     => 'Pengumuman Kelulusan ADM',
            'content'   => 'pengumuman/adm',
            'costum_js' => 'pengumuman/js'
        ];
        echo $this->template->views($data);
	}

    public function ajax_beralih($nik)
    {
        if ($this->input->is_ajax_request() == true) {
            $data = [
                'jalur'         =>  'reguler',
                'jurusan'       => '',
                'no_ujian'      => '',
                'jadwal_ujian'  => NULL,
                'ruang_cat'     => '',
                'sesi_cat'      => '',
                'ruang_lisan'   => '',
                'sesi_lisan'    => '',
                'ujian_via'     =>  'offline',
                's_akademik'    =>  '0',
                's_payment'     =>  '0',
                's_biodata'     =>  '1',
                's_file'        =>  '1',
                's_lulus_adm'   =>  '1',
                's_cetak'       =>  '0',
                's_lulus'       =>  '0',
            ];

            $data2 = [
                'struk'         => '',
            ];

            $payload1 = $this->M_Filepsb->update($nik, $data2);
            $payload2 = $this->M_Peserta->update_nik($nik, $data);

            if ($payload1 && $payload2)
            {
                echo json_encode(array("status" => true));
            } else {
                echo json_encode(array("status" => true));
            }
        } else {
            exit('Maaf Data Tidak Bisa di Proses');
        }

    }
}
