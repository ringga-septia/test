<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class Sub_menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('auth/profile', $data);
        $this->load->view('tamplate/futer', $data);
    }

    public function edit_profil()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('auth/edit_profil', $data);
            $this->load->view('tamplate/futer', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            //cek gamar kalo ada
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/gambar_profil/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '10000';

                $this->load->library('upload', $config);

                $old_image = $data['user']['image'];
                if ($old_image != 'defaul.jpg') {
                    unlink(FCPATH . 'assets/gambar_profil/' . $old_image);
                }

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('admin');

            $this->session->set_flashdata('message', '<div class="alert alert-success">
                 profil telah di Update !
                     </div>');
            redirect('menu/sub_menu/edit_profil');
        }
    }


    //data mhs
    public function absen_mhs()
    {


        $data['title'] = 'Absen Mahasiswa';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['absen'] = $this->db->get('absen_mhs')->result_array();
        $data['jurusan'] = $this->db->get('prodi')->result_array();


        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('menu/absen_cari', $data);
        $this->load->view('tamplate/futer', $data);
    }

    public function data_mhs()
    {

        $data['title'] = 'Data Mahasiswa';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['mahasiswa'] = $this->db->get('mhs')->result_array();
        $data['jurusan'] = ['Teknik Informatika', 'Perbaikan & Perawatan Mesin', 'Teknik Pengolahan Sawit'];
        $data['class'] = $this->db->get('class')->result_array();

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('pass', 'pass', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('prodi', 'prodi', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
        $this->form_validation->set_rules('thn', 'thn', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('menu/data_mhs', $data);
            $this->load->view('tamplate/futer', $data);
        } else {
            $idClass = $this->input->post('class');
            $data = [
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
                'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
                'nim' => $this->input->post('nim'),
                'prodi' => $this->input->post('prodi'),
                'semester' => $this->input->post('semester'),
                'image' => 'defaul.png',
                'thn' => $this->input->post('thn'),
                'id_class' => $idClass
            ];


            $this->db->insert('mhs', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">
                data sudah di simpan !
                    </div>');
            redirect('menu/sub_menu/data_mhs');
        }
    }
    //data dosen
    public function data_dosen()
    {

        $data['title'] = 'Data Dosen';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['dosen'] = $this->db->get('dosen')->result_array();


        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('pass', 'pass', 'required');
        $this->form_validation->set_rules('nidn', 'nidn', 'required');
        $this->form_validation->set_rules('nrp', 'nrp', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('menu/data_dosen', $data);
            $this->load->view('tamplate/futer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
                'nidn' => $this->input->post('nidn'),
                'nrp' => $this->input->post('nrp'),
                'jabatan' => $this->input->post('jabatan'),
                'keterangan' => $this->input->post('keterangan'),
                'image' => 'defaul.png'
            ];
            $this->db->insert('dosen', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">
                data sudah di simpan !
                    </div>');
            redirect('menu/sub_menu/data_dosen');
        }
    }

    public function absen_dosen()
    {
        $data['title'] = 'Absen Mahasiswa';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['absen'] = $this->db->get('absen_mhs')->result_array();
        $data['jurusan'] = $this->db->get('prodi')->result_array();


        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('menu/absen_cari', $data);
        $this->load->view('tamplate/futer', $data);
    }

    public function ganti_pass()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('old_pass', 'Password lama', 'required|trim');
        $this->form_validation->set_rules('new_pass1', 'Password', 'required|trim|min_length[6]|matches[new_pass2]');
        $this->form_validation->set_rules('new_pass2', 'Verifikasi Password', 'required|trim|min_length[6]|matches[new_pass1]');


        if ($this->form_validation->run() == false) {

            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('auth/ganti_pass', $data);
            $this->load->view('tamplate/futer', $data);
        } else {
            $old_pass = $this->input->post('old_pass');
            $new_pass = $this->input->post('new_pass1');

            if (!password_verify($old_pass, $data['user']['pass'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning">
                passwort lama salah !
                    </div>');
                redirect('menu/sub_menu/ganti_pass');
            } else {

                if ($old_pass == $new_pass) {
                    $this->session->set_flashdata('message', '<div class="alert alert-alert-warning">
                    passwort lama dan baru sama !
                        </div>');
                    redirect('menu/sub_menu/ganti_pass');
                } else {
                    $pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);

                    $this->db->set('pass', $pass_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('admin');

                    $this->session->set_flashdata('message', '<div class="alert alert-success">
                    passwort telah di Update !
                        </div>');
                    redirect('menu/sub_menu/ganti_pass');
                }
            }
        }
    }

    public function class()
    {
        $data['title'] = 'Data Class';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['class'] = $this->db->get('class')->result_array();
        $data['jurusan'] = ['Teknik Informatika', 'Perbaikan & Perawatan Mesin', 'Teknik Pengolahan Sawit'];

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('thn', 'thn', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('menu/class', $data);
            $this->load->view('tamplate/futer', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'thn' => $this->input->post('thn'),
                'jmlh_mhs' => $this->input->post('jumlah'),

            ];
            $this->db->insert('class', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">
                data sudah di simpan !
                    </div>');
            redirect('menu/sub_menu/class');
        }
    }

    public function Rekap()
    {
        $data['title'] = 'Absen sementara';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['class'] = $this->db->get('class')->result_array();
        $data['makul'] = $this->db->get('mata_kuliah')->result_array();

        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('menu/rekap', $data);
        $this->load->view('tamplate/futer', $data);
    }

    public function isi_pertemuan()
    {
        $idClass = $this->input->post('class');
        $makul = $this->input->post('makul');
        $pertemuan = $this->input->post('pertemuan');

        $querySubMenu = "SELECT `mhs`.`nim` 
        FROM `mhs` 
        WHERE `id_class`  = $idClass 
        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        foreach ($subMenu as $sm) {
            $data[] = [
                'nim' => $sm['nim'],
                'i' => 0,
                'h' => 0,
                'pertemuan' => $pertemuan,
                'id_class' => $idClass,
                'makul' => $makul
            ];
        }
        //cek data ada atau tidak
        $dm = $this->db->get_where('rekap', ['makul' => $makul, 'id_class' => $idClass])->row_array();
        if ($dm == null) {
            $this->db->insert_batch('rekap', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-warning">
                    data sudah di simpan !
                        </div>');
            redirect('menu/sub_menu/rekap');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">
            data sudah ada
                </div>');
            redirect('menu/sub_menu/rekap');
        }
    }

    public function absen_class()
    {
        $data['title'] = 'Absen';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('menu/absen_mhs_rekap', $data);
        $this->load->view('tamplate/futer', $data);
    }
}
