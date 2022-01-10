<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        check_login();
        check_payment();
        check_biodata();
        check_berkas();
        check_lulus_adm();
        check_buka_menu(psb_detail('buka_daftar_reguler'));
        $this->load->model('M_Peserta');
    }

	public function index()
	{
        
        $get = $this->M_Peserta->get($this->session->userdata['id']);
        $join    = $this->M_Peserta->get_file($this->session->userdata['nik']);

        if ($get->jalur == "reguler" && $get->jadwal_ujian == NULL){
            $data = [
                'title'     => 'Pilih Jadwal Ujian',
                'content'   => 'cetak/jadwal',
                'costum_js' => 'cetak/js-jadwal',
            ];
            echo $this->template->views($data);
        } elseif ($get->jalur == "undangan" && $get->jadwal_ujian == NULL) {
            $data = [
                'title'     => 'Pilih Wawancara Via',
                'content'   => 'cetak/lokasi',
                'costum_js' => 'cetak/js-lokasi'
            ];
            echo $this->template->views($data);
        } else {
            $this->do_cetak($join);
        }
	}

    public function ajax_get_jadwal()
    {
        if ($this->input->is_ajax_request() == true) {

            foreach (arr_jadwal_reguler() as $key) {
                $countjadwal = $this->M_Peserta->get_by_jadwal($key)->num_rows();
                if ($countjadwal >= "240"){
                    $status = 'disabled';
                    $msg = ' - KUOTA PENUH';
                    $keys = ""; 
                } else {
                    $keys = $key; 
                    $status = '';
                    $msg = " - (".$countjadwal." Peserta)";
                }

                $data []= [
                    'key'       => $keys,
                    'value'     => longdate_indo($key),
                    'status'    => $status,
                    'msg'       => $msg,
                ];
            }
            echo json_encode(array('status' => true, 'result' => $data));
        } else {
            exit('Error');
        }
    }

    public function ajax_save_jadwal()
    {
        if ($this->input->is_ajax_request() == true) {
            $jadwal = $this->input->post('jadwal_ujian');
            $get    = $this->M_Peserta->get($this->session->userdata['id']);

                $data = [
                    'jurusan'       => $this->input->post('jurusan'),
                    'no_ujian'      => get_noujian($this->input->post('jurusan')),
                    'jadwal_ujian'  => $jadwal,
                    'ruang_cat'     => get_catlisan($jadwal)['ruang_cat'],
                    'sesi_cat'      => get_catlisan($jadwal)['sesi_cat'],
                    'ruang_lisan'   => get_catlisan($jadwal)['ruang_lisan'],
                    'sesi_lisan'    => get_catlisan($jadwal)['sesi_lisan'],
                    'ujian_via'     => 'offline',
                    's_cetak'       => '1'
                ];

                $this->M_Peserta->update($this->session->userdata['id'], $data);
                echo json_encode(array('status' => true, 'message' => "Berhasil Pilih Lokasi"));
        } else {
            exit('Error');
        }
    }

    public function ajax_lokasi()
    {
        if ($this->input->is_ajax_request() == true) {

            $via = $this->input->post('ujian_via');

            if ($via == 'online'){
                $data = [
                    'jurusan'       => $this->input->post('jurusan'),
                    'no_ujian'      => get_noujian($this->input->post('jurusan')),
                    'jadwal_ujian'  => '2022-01-01',
                    'ruang_lisan'   => 'ZOOM / GOOGLE MEET',
                    'sesi_lisan'    => '08:00 - 12:00',
                    'ujian_via'     => $via,
                    's_cetak'       => '1',
                ];
            } elseif ($via == 'offline') {
                $data = [
                    'jurusan'       => $this->input->post('jurusan'),
                    'no_ujian'      => get_noujian($this->input->post('jurusan')),
                    'jadwal_ujian'  => '2022-01-01',
                    'ruang_lisan'   => 'RUANG-UNDANGAN',
                    'sesi_lisan'    => '08:00 - 12:00',
                    'ujian_via'     => $via,
                    's_cetak'       => '1',
                ];
            }
            $this->M_Peserta->update($this->session->userdata['id'], $data);
            echo json_encode(array('status' => true, 'message' => "Berhasil Pilih Lokasi"));
        } else {
            exit('Error');
        }
    }

    private function do_cetak($join)
    {
        $this->load->library('Pdf');
        $data = [
            'title'         => 'Berkas PSB',
            'assetsurl'     => base_url('assets/'),
            'filesurl'      => cdn_file('uploads/'),
            'output'        => $join->row(),
            'ketua_panitia' => psb_detail('ketua_panitia_psb'),
        ];
        $this->load->view('cetak/pdf-output', $data);
    }
}
