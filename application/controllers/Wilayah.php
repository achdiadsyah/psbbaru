<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        // check_login();
        header("Access-Control-Allow-Origin: *");
        $this->load->model('M_Wilayah');
    }

	public function ajax_prov()
    {
        $result = $this->M_Wilayah->get_provinsi();
        echo json_encode($result->result());
    }

    public function ajax_kabupaten($id)
    {
        $result = $this->M_Wilayah->get_kabupaten_by_prov($id);
        echo json_encode($result);
    }

    public function ajax_kecamatan($id)
    {
        $result = $this->M_Wilayah->get_kecamatan_by_kab($id);
        echo json_encode($result);
    }

    public function ajax_desa($id)
    {
        $result = $this->M_Wilayah->get_desa_by_kec($id);
        echo json_encode($result);
    }
}
