<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('auth/user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pass', 'Pass', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('login/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');

        $user = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($pass, $user['pass'])) {
                $data = [
                    'email' => $user['email'],
                    'role' => 1
                ];

                $this->session->set_userdata($data);
                redirect('menu/sub_menu');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            password salah !
            </div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        akun tidak ada!
        </div>');
            redirect('auth/login');
        }
    }

    public function loqout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('message', '<div>
        anda telah keluar !
        </div>');
        redirect('auth/login');
    }
}
