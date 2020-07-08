<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
        is_logged_in();
    }
    public function index()
    {

        $nim = $this->input->post('nim');

        $tgl = $this->input->post('tgl');

        $data['jurusan'] = ['Teknik Informatika', 'Perbaikan & Perawatan Mesin', 'Teknik Pengolahan Sawit'];
        $data['title'] = 'Absen Mahasiswa';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        if ($nim == null) {
            if ($tgl == null) {
                $data['absen'] = $this->db->query("SELECT * FROM `absen_mhs`")->result_array();
            } else {
                $data['absen'] = $this->db->query("SELECT * FROM `absen_mhs` WHERE `tgl` = '$tgl' ")->result_array();
            }
        } else {
            if ($tgl) {
                $data['absen'] = $this->db->query("SELECT * FROM `absen_mhs` WHERE `tgl` LIKE '$tgl' AND `nim` = $nim")->result_array();
            } else {
                $data['absen'] = $this->db->query("SELECT * FROM `absen_mhs` WHERE `nim` = $nim ")->result_array();
            }
        }


        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('menu/absen_cari', $data);
        $this->load->view('tamplate/futer', $data);
    }

    public function cari_mhs()
    {
        $thn = $this->input->get('thn');
        $nama = $this->input->get('name');
        $prodi = $this->input->get('prodi');
        $data['jurusan'] = ['Teknik Informatika', 'Perbaikan & Perawatan Mesin', 'Teknik Pengolahan Sawit'];
        $data['title'] = 'Data Mahasiswa';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();


        if ($thn == null) {
            if ($nama == null) {
                $data['mahasiswa'] = $this->db->query("SELECT * FROM `mhs` WHERE `prodi` = '$prodi'")->result_array();
            } else {
                $data['mahasiswa'] = $this->db->query("SELECT * FROM `mhs` WHERE `name` LIKE '$nama' AND `prodi` = '$prodi'")->result_array();
            }
        } else {
            if ($nama == null) {
                $data['mahasiswa'] = $this->db->query("SELECT * FROM `mhs` WHERE `prodi` = '$prodi' AND `thn` = $thn")->result_array();
            } else {
                $data['mahasiswa'] = $this->db->query("SELECT * FROM `mhs` WHERE `name` = '$nama' AND `prodi` = '$prodi' AND `thn` = $thn")->result_array();
            }
        }
        // var_dump($nama, $prodi, $thn);
        // die;
        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('menu/cari_mhs', $data);
        $this->load->view('tamplate/futer', $data);
    }
}
