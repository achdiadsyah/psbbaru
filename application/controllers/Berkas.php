<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        check_login();
        check_payment();
        check_biodata();

        $this->load->model('M_Peserta');
    }

	public function index()
	{
		$data = [
            'title'     => 'Upload File dan Berkas',
            'content'   => 'berkas/index'
        ];
        echo $this->template->views($data);
	}
}
