<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blok extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Blok';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('menu/blok');
        $this->load->view('tamplate/futer', $data);
    }
}
