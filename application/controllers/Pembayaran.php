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

    function ajax_update($nik)
    {
        $data2 = [
            's_payment'=> '3',
        ];  
        $insert = $this->M_Peserta->update_nik($nik, $data2);
        if ($insert) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function get_status($nik)
    {
        if ($this->input->is_ajax_request() == true) {
            $get = $this->M_Peserta->get_file($nik)->row();
            if ($get->struk == NULL){
                echo json_encode(array('status' => false, 'message' => "Silahkan Upload Slip Transfer Anda"));
            } elseif ($get->struk == "undangan.jpg"){
                echo json_encode(array('status' => false, 'message' => "Jalur Undangan, Tidak perlu upload bukti pembayaran"));
            } else {
                if($get->s_payment == 1){
                    echo json_encode(array('status' => true, 'message' => "Verifikasi Berhasil, Pembayaran di terima <br> <a href='".base_url('biodata')."' class='btn btn-primary'>Lanjut Isi Biodata</a>"));
                } elseif ($get->s_payment == 2){
                    echo json_encode(array('status' => true, 'message' => "Pembayaran anda di tolak"));
                } elseif ($get->s_payment == 3){
                    echo json_encode(array('status' => true, 'message' => "Sudah Pernah Upload, Menunggu Verifikasi <p>Jika Anda tidak menerima whatsapp dari kami 1x24 Jam, segera hubungi kami untuk konfirmasi manual</p><br><button class='btn btn-primary btn-sm' onClick="."show_file('struk/".$get->struk."')".">Lihat Struk Anda</button>"));
                }
            }
        } else {
            exit('Error');
        }
    }
}
