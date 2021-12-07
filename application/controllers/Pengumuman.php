<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('M_Peserta');
    }

	public function reguler()
	{
		$data = [
            'title'     => 'Pengumuman Kelulusan Jalur Reguler',
            'content'   => 'pengumuman/reguler'
        ];
        echo $this->template->views($data);
	}

    public function undangan()
	{
		$data = [
            'title'     => 'Pengumuman Kelulusan Jalur Undangan',
            'content'   => 'pengumuman/undangan'
        ];
        echo $this->template->views($data);
	}
}
