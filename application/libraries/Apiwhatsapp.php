<?php
	class Apiwhatsapp {
		protected $_ci;

		function __construct() {
			$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
		}

		function send($payload, $target) {
			
			$this->_ci->load->model('M_Walayanan');
			$geturl = $this->_ci->M_Walayanan->get_by_service($target);
			$url = $geturl->url;
			

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_SSL_VERIFYHOST => false,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => $payload,
				// CURLOPT_HTTPHEADER => array(
				// 	'Cookie: ci_session=c08265de3bcc0e9d3f247c34e3e2c5d3d766f257'
				// ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return $response;
		}
	}
	
?>