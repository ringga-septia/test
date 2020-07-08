<?php

class Coba_mode extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }

    public function add_class($data)
    {
        $this->db->insert('class', $data);
        return $this->db->affected_rows();
    }

    public function absen_dosen($data)
    {
        $this->db->insert('absen_dosen', $data);
        return $this->db->affected_rows();
    }
    public function absenMhs($data)
    {
        $this->db->insert('absen_mhs', $data);
        return $this->db->affected_rows();
    }

    public function absenDosen($data)
    {
        $this->db->insert('absen_dosen', $data);
        return $this->db->affected_rows();
    }
}
