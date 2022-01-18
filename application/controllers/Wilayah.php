<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        // check_login();

        $this->load->model('M_Wilayah');
        $this->load->model('M_Peserta');
        $this->load->model('M_Chat');
    }

	public function ajax_prov()
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->M_Wilayah->get_provinsi();
            echo json_encode($result->result());
        } else {
            exit('Error');
        }
    }

    public function ajax_kabupaten($id)
    {
        if ($this->input->is_ajax_request() == true) {
            $result = $this->M_Wilayah->get_kabupaten_by_prov($id);
            echo json_encode($result);
        } else {
            exit('Error');
        }
    }

    public function ajax_kecamatan($id)
    {
        if ($this->input->is_ajax_request() == true) {
            $result = $this->M_Wilayah->get_kecamatan_by_kab($id);
            echo json_encode($result);
        } else {
            exit('Error');
        }
    }

    public function ajax_desa($id)
    {
        if ($this->input->is_ajax_request() == true) {
            $result = $this->M_Wilayah->get_desa_by_kec($id);
            echo json_encode($result);
        } else {
            exit('Error');
        }
    }


    public function getbayaraberes()
    {
        $get = $this->M_Peserta->get_rahmat()->result();

        $pesan_wa = "Assalamualaikum.. Bpk/Ibu".urldecode('%0A').
        "dikarenakan terjadi kesalahan di server pesan whatsapp, sehingga hari ini pesan bpk/ibu terhapus secara keseluruhan, oleh karena itu bagi bapak/ibu yang memiliki kendala dan masalah dalam pendaftaran baik itu yg telah kami data atau belum, harap kembali mengirimkan pesan sebagai berikut :".urldecode('%0A%0A').
        "Nama Calon Santri :".urldecode('%0A').
        "NIK Yang Terdaftar :".urldecode('%0A').
        "Kendala / Masalah :".urldecode('%0A%0A').
        "Atas perhatian bapak/ibu, kami ucapkan terima kasih".urldecode('%0A').
        "#PanitiaPSB2022";

        foreach ($get as $key) {
        
            $data []= [
                'no_telepon'    => $key->no_telepon,
                'pesan'         => $pesan_wa,
                'type'          => 'Text',
                'status_proses' => 'pending'
            ];
        }

        $this->M_Chat->insert_banyak($data);
    }
}
