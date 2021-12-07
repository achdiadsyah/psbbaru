<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        check_login();
        $this->load->model('M_Peserta');
        $this->load->model('M_Psbdetail');
    }

	public function index()
	{
		$data = [
            'title'     => 'Dashboard',
            'content'   => 'dashboard/index'
        ];
        echo $this->template->views($data);
	}
}
