<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Peserta extends CI_Model {


    private $table = "peserta_psb";
	
    // Query Umum
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

    public function get_by_checksum($value)
    {
        $this->db->where('checksum', $value);
        $query = $this->db->get($this->table);
        return $query;
    }

    public function insert($data)
    {
        $query = $this->db->insert($this->table, $data);
        return $query;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update($this->table, $data);
        return $query;
    }

    public function update_checksum($checksum, $data)
    {
        $this->db->where('checksum', $checksum);
        $query = $this->db->update($this->table, $data);
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete($this->table);
        return $query->affected_rows();
    }

    public function get_file($nik)
    {
        $query = $this->db
        ->select('*')
        ->from ('peserta_psb')
        ->join ('file_psb', 'file_psb.nik = peserta_psb.nik')
        ->where("peserta_psb.nik",$nik)
        ->get();
        return $query;
    }

    // Query Masal
    public function get_by_tanggal_daftar($tanggal)
    {
        $this->db->where('tanggal_daftar', $tanggal);
        $query = $this->db->get($this->table);
        return $query;
    }

    public function get_by_jurusan($jurusan)
    {
        $this->db->where('jurusan', $jurusan);
        $query = $this->db->get($this->table);
        return $query;
    }

    public function get_by_jadwal($tanggal)
    {
        $this->db->where('jadwal_ujian', $tanggal);
        $query = $this->db->get($this->table);
        return $query;
    }
}
