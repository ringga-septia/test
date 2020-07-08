<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
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

        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('mhs', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('tamplate/futer', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 'data sudah di simpan');
            redirect('data/menu');
        }
    }

    public function submenu()
    {
        $role = $this->session->userdata('role_id');
        if ($role == 1) {
        } else {
            redirect('auth/blok');
        }
        $data['title'] = 'sub menu';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('tamplate/futer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'icon' => $this->input->post('icon'),
                'url' => $this->input->post('url'),
                'is_aktif' => $this->input->post('is_aktif')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'data sudah di simpan');
            redirect('data/menu/submenu');
        }
    }
}
