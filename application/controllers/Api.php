<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
    {
		parent::__construct();

        $this->load->library('Apiwhatsapp');
    }

	public function send()
	{
		
	}

	public function checkNumberWA($nomor)
	{

        header("Access-Control-Allow-origin: *");
        header("Access-Control-Allow-Methods: POST,GET");
        if ($this->input->is_ajax_request() == true) {
            $target = 'CheckNumber';

            $ptn = "/^0/";  // Regex
            $rpltxt = "62";  // Replacement string

            $payload = [
                'token' => $this->config->item('WAapiKey'),
                'number' => preg_replace($ptn, $rpltxt, $nomor),
            ];
            echo $this->apiwhatsapp->send($payload, $target);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
	}

    public function kodeUndangan($kode)
    {
        if ($this->input->is_ajax_request() == true) {
            if ($kode !== psb_detail('kode_jalur_undangan')){
                echo json_encode(array("status" => false, "msg" => "Kode Undangan Tidak Sesuai, Mintalah pada panitia"));
            } else if ($kode === psb_detail('kode_jalur_undangan')){
                echo json_encode(array("status" => true, "msg" => "Kode Undangan Sesuai"));
            }
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }
}