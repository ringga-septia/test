<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $role = $this->session->userdata('role_id');
        if ($role == 1) {
        } else {
            redirect('auth/blok');
        }
        $data['title'] = 'Dashboar';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('auth/admin', $data);
        $this->load->view('tamplate/futer', $data);
    }
}
