<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`. `menu` FROM `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
        return $this->db->query($query)->result_array();
    }

    public function cari1($nim, $tgl, $prodi, $keterangan)
    {
        $query = "SELECT * FROM `absen_mhs` WHERE `nim` = $nim AND `prodi` LIKE '$prodi' AND `tgl` LIKE '$tgl' AND `keterangan` LIKE '$keterangan'";
        return $this->db->query($query)->result_array();
    }
    public function cari2($nim, $prodi, $keterangan)
    {

        $query = "SELECT * FROM `absen_mhs` WHERE `nim` = $nim AND `prodi` LIKE '$prodi' AND `keterangan` LIKE '$keterangan'";
        return $this->db->query($query)->result_array();
    }
    public function cari3($tgl, $prodi, $keterangan)
    {
        $query = "SELECT * FROM `absen_mhs` WHERE `prodi` LIKE '$prodi' AND `tgl` LIKE '$tgl' AND `keterangan` LIKE '$keterangan'";
        return $this->db->query($query)->result_array();
    }
    public function cari4($prodi, $keterangan)
    {
        $query = "SELECT * FROM `absen_mhs` WHERE `prodi` LIKE '$prodi' AND `keterangan` LIKE '$keterangan'";
        return $this->db->query($query)->result_array();
    }
}
