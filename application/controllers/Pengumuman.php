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
        check_akses_pengumuman('reguler');
		$data = [
            'title'     => 'Pengumuman Kelulusan Jalur Reguler',
            'content'   => 'pengumuman/reguler',
            'costum_js' => 'pengumuman/js'
        ];
        echo $this->template->views($data);
	}

    public function undangan()
	{
        check_akses_pengumuman('undangan');
		$data = [
            'title'     => 'Pengumuman Kelulusan Jalur Undangan',
            'content'   => 'pengumuman/undangan',
            'costum_js' => 'pengumuman/js'
        ];
        echo $this->template->views($data);
	}
}
