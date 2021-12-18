<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
    {
		parent::__construct();

        $this->load->library('Apiwhatsapp');
        $this->load->model('M_Chat');
    }

	public function send()
	{
		$limit = '1';
	    $get_chat = $this->M_Chat->get_to_send($limit);
	    
	    if (empty($get_chat)) {
            exit();
        } else {
            foreach ($get_chat as $key){

                if ($key->type == "Text"){
                    $target = $key->type;
                    
                    $payload = [
                        'token' => $this->config->item('WAapiKey'),
                        'number' => $key->no_telepon,
                        'message' => $key->pesan
                    ];
                       
                } else if ($key->type == "Image"){
                    $target = $key->type;
                    
                    $payload = [
                        'token' => $this->config->item('WAapiKey'),
                        'number' => $key->no_telepon,
                        'file' => $key->file_url,
                        'caption' => $key->pesan
                    ];   
                } else if ($key->type == "Video"){
                    $target = $key->type;
                    
                    $payload = [
                        'token' => $this->config->item('WAapiKey'),
                        'number' => $key->no_telepon,
                        'file' => $key->file_url,
                        'caption' => $key->pesan
                    ];   
                } else if ($key->type == "Audio"){
                    $target = $key->type;
                    
                    $payload = [
                        'token' => $this->config->item('WAapiKey'),
                        'number' => $key->no_telepon,
                        'file' => $key->file_url,
                        'caption' => $key->pesan,
                        'ptt'	=> false
                    ];   
                } else if ($key->type == "Location"){
                    $target = $key->type;
                    
                    $payload = [
                        'token' => $this->config->item('WAapiKey'),
                        'number' => $key->no_telepon,
                        'latitude' => '',
                        'longitude' => ''
                    ];   
                } else if ($key->type == "Link"){
                    $target = $key->type;
                    
                    $payload = [
                        'token' => $this->config->item('WAapiKey'),
                        'number' => $key->no_telepon,
                        'link' => $key->pesan
                    ];   
                }

                // Jalankan Request ke API Per Pesan
                $proses = $this->apiwhatsapp->send($payload, $target);
                $respond =  json_decode($proses);
            
                if ($respond->result == true) {
                    $update = [
                        'chat_id' => $respond->id,
                        'status_proses' => 'sended',
                        'respond_server' => $respond->message,
                    ];
                } else if ($respond->result == false){
                    $update = [
                        'status_proses' => 'fail',
                        'respond_server' => $respond->message,
                    ];
                }
                $this->M_Chat->update($key->id, $update);
            }
        }
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