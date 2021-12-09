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
        $this->load->model('M_Peserta');
    }

	public function index()
	{
        
        $get = $this->M_Peserta->get($this->session->userdata['id']);
        $join    = $this->M_Peserta->get_file($this->session->userdata['nik']);

        if ($get->jadwal_ujian == ""){
            $data = [
                'title'     => 'Pilih Jadwal Ujian',
                'content'   => 'cetak/jadwal',
                'costum_js' => 'cetak/js-jadwal',
            ];
            echo $this->template->views($data);
        } elseif ($get->jadwal_ujian == psb_detail('tes_undangan') && $get->ujian_via == NULL) {
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
                if ($countjadwal >= "100"){
                    $status = 'disabled';
                    $msg = ' - KUOTA PENUH';
                    $keys = ""; 
                } else {
                    $keys = $key; 
                    $status = '';
                    $msg = " - ".$countjadwal." Peserta";
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
                    'jadwal_ujian'  => $jadwal,
                    'ruang_cat'     => get_cat($jadwal)['ruang_cat'],
                    'sesi_cat'      => get_cat($jadwal)['sesi_cat'],
                    'ruang_lisan'   => get_lisan($jadwal)['ruang_lisan'],
                    'sesi_lisan'    => get_lisan($jadwal)['sesi_lisan'],
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
            $data = [
                'ujian_via' => $this->input->post('ujian_via'),
                's_cetak'   => '1',
            ];
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
            'output'        => $join->row(),
            'ketua_panitia' => psb_detail('ketua_panitia_psb'),
        ];
        $this->load->view('cetak/pdf-output', $data);
    }
}
