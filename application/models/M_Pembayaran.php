<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pembayaran extends CI_Model {


    private $table = "pembayaran_psb";
	
    
    public function get($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function get_by_nik($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get($this->table);
        return $query;
    }

    public function insert($data)
    {
        $query = $this->db->insert($this->table, $data);
        return $query;
    }

    public function update($data)
    {
        $query = $this->db->update($this->table, $data);
        return $query->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete($this->table);
        return $query;
    }
}
