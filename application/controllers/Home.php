<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        $this->load->model('M_Peserta');
    }

	public function index()
	{
        check_logout();
		$data = [
            'title'     => 'Beranda',
            'content'   => 'home/index',
            'costum_js' => 'home/js-home'
        ];
        echo $this->template->views($data);
	}

	public function alur()
	{
        check_logout();
		$data = [
            'title'     => 'Alur Pendaftaran',
            'content'   => 'home/alur'
        ];
        echo $this->template->views($data);
	}

	public function biaya()
	{
        check_logout();
		$data = [
            'title'     => 'Pembayaran Biaya PSB',
            'content'   => 'home/biaya'
        ];
        echo $this->template->views($data);
	}

	public function contact_us()
	{
        check_logout();
		$data = [
            'title'     => 'Hubungi Kami',
            'content'   => 'home/contact'
        ];
        echo $this->template->views($data);
	}

    public function nojsenabled()
	{
		$this->load->view('errors/html/error_js');
	}
}
