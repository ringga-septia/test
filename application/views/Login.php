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

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_aktif'] == 1) {
                // if (password_verify($pass, $user['pass']))
                if ($pass == $user['pass']) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'nim' => $user['nim']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        //ke admin
                        redirect('auth/admin');
                    } elseif ($user['role_id'] == 2) {
                        //ke mahasiswa
                        redirect('auth/user');
                    } else {
                        //ke staf
                        redirect('auth/staf');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            password salah !
            </div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            user tidak aktif !
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

    // public function register()
    // {
    //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[mahasiswa.email]', [
    //         'is_inique' => 'email telah terdaftar'
    //     ]);
    //     $this->form_validation->set_rules('pass', 'Pass', 'required|trim|min_length[6]|matches[re_pass]');
    //     $this->form_validation->set_rules('re_pass', 'Re_pass', 'required|trim|matches[pass]');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('auth/register');
    //     } else {
    //         $data = [
    //             'name' => htmlspecialchars($this->input->post('name')),
    //             'email' => htmlspecialchars($this->input->post('email')),
    //             'image' => 'defaul.png',
    //             'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
    //             'role_id' => 2,
    //             'is_aktif' => 1,
    //             'date_creat' => time()
    //         ];
    //         $this->db->insert('mahasiswa', $data);

    //         $this->session->set_flashdata('message', '<div>
    //         anda telah login !
    //         </div>');
    //         redirect('admin');
    //     }
    // }

    public function loqout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div>
        anda telah keluar !
        </div>');
        redirect('auth/login');
    }
}
