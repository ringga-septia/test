<?php

class Data_model extends CI_Model
{
    public function getData($name = null)
    {
        if ($name === null) {
            return $this->db->get('mhs')->result_array();
        } else {
            return $this->db->get_where('mhs', ['name' => $name])->row_array();
        }
    }

    public function tambah($data)
    {
        $this->db->insert('absen_absen', $data);
        return $this->db->affected_rows();
    }
}
