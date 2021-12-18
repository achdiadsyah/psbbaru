<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
    {
		parent::__construct();

        $this->load->model('M_Walayanan');

		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
    }

	private function sendtogroup($pesan)
	{
		$geturl = $this->M_Walayanan->get_by_service("TextGroup");
		$url = $geturl->url;
		$payload = [
			'token' => $this->config->item('WAapiKey'),
			'number' => $this->config->item('WAgroupAdmin'),
			'message' => $pesan
		];
		$request =  $this->apicall->whatsapp($payload, $url);
		if ($request->success == true) {
			return true;
		} else if ($request->success == false){
			return false;
		}
	}

	public function checkNumberWA($nomor)
	{

		$key = "CheckNumber";
		$geturl = $this->M_Walayanan->get_by_service($key);
		$url = $geturl->url;
		
		$ptn = "/^0/";  // Regex
		$rpltxt = "62";  // Replacement string

		$data = [
			'token'     => $this->config->item('WAapiKey'),
			'number'    => preg_replace($ptn, $rpltxt, $nomor),
		];
        
        /* eCurl */
        $curl = curl_init($url);
   
        /* Set JSON data to POST */
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            
        /* Define content type */
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            
        /* Return json */
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
        /* make request */
        $result = curl_exec($curl);
             
        /* close curl */
        curl_close($curl);

        var_dump($result);
			
	}
}