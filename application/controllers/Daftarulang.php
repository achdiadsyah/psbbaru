<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarulang extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        check_login();
        // check_lulus_adm();
        // check_lulus();
        $this->load->model('M_Peserta');
    }

	public function index()
    {
        $data = [
            'title'     => 'Daftar Ulang',
            'content'   => 'daftarulang/index'
        ];
        echo $this->template->views($data);
    }
}
