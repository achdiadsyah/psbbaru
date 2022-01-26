<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
    {
		parent::__construct();

        $this->load->library('Apiwhatsapp');
        $this->load->model('M_Chat');
        $this->load->model('M_Peserta');
    }

	public function send()
	{
		$limit = '2';
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
                } else if ($key->type == "TextGroup"){
                    $target = $key->type;
                    
                    $payload = [
                        'token' => $this->config->item('WAapiKey'),
                        'number' => $key->no_telepon,
                        'message' => $key->pesan
                    ];
                }

                // Jalankan Request ke API Per Pesan
                $proses = $this->apiwhatsapp->send($payload, $target);
                $respond =  json_decode($proses);
            
                if ($respond->id == "" OR $respond->result == "false") {
                     $update = [
                        'status_proses' => 'pending',
                        'respond_server' => $respond->message,
                    ];
                } else {
                    $update = [
                        'chat_id' => $respond->id,
                        'status_proses' => 'sended',
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


    public function gettosend()
    {
        $query = $this->M_Peserta->gettosend()->result();
        foreach ($query as $key) {

            $pesan_wa = "Assalamualaikum..".urldecode('%0A').
            "Kami informasikan kepada seluruh peserta Tes Santri Baru di Ruhul Islam Anak Bangsa agar *DAPAT MENCETAK ULANG KARTU UJIAN* karena ada beberapa informasi tambahan dan perbaikan :".urldecode('%0A').
            "1. Perubahan beberapa No ujian peserta tes".urldecode('%0A').
            "2. *Informasi wawancara wali santri*".urldecode('%0A').
            "3. Biodata yang belum diperbaiki, akan diperbaiki di hari tes".urldecode('%0A%0A').
            "Bagi yang masih terkendala gagal cetak kartu ujian, agar segera dapat menginformasikan ke Panita melalui kontak person berikut : *085222935475* / *082219217307*".urldecode('%0A').
            "Atas perhatian bapak/ibu, kami ucapkan terima kasih".urldecode('%0A').
            "Terima Kasih. Wassalamualaikum.wr.wb";

            $data3 = [
                'no_telepon'    => $key->no_telepon,
                'pesan'         => $pesan_wa,
                'type'          => 'Text',
                'status_proses' => 'pending'
            ];

            $this->M_Chat->insert($data3);
        }
    }

}
