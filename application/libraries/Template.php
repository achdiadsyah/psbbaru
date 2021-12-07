<?php
	class Template {
		protected $_ci;

		function __construct() {
			$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
		}

		function views($data) {
			
			if ($data != NULL) {
				return $this->_ci->load->view('_layout_/index', $data, TRUE);
			}
		}
	}
	
?>