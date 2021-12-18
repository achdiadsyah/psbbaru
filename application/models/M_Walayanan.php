<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Walayanan extends CI_Model
{

    // START DATATABLE QUERY
    public $table = 'api_provider';

    
    public function get_by_service($key)
    {
        $this->db->from($this->table);
        $this->db->where('service_name', $key);
        return $this->db->get()->row();
    }
    
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

}
