<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        $this->load->model('M_Peserta');
    }

	public function index()
	{
        check_login();
        check_payment();
        check_biodata();
        check_berkas();
		$data = [
            'title'     => 'Cetak Berkas',
            'content'   => 'cetak/index'
        ];
        echo $this->template->views($data);
	}
}
