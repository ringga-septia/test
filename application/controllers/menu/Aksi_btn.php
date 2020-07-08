<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_btn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aksi', 'aksi');
        is_logged_in();
    }
    public function hapus($id)
    {
        $this->aksi->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-warning">
            data sudah di hapus !
                </div>');
        redirect('menu/sub_menu/data_mhs');
    }


    public function edit($id)
    {

        $data['title'] = 'Edit Data Mahasiswa';
        $data['user'] = $this->db->get_where('mhs', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('mhs', ['id' => $id])->row_array();
        $data['jurusan'] = ['Teknik Informatika', 'Perbaikan & Perawatan Mesin', 'Teknik Pengolahan Sawit'];

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('thn', 'thn', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('menu/edit_mhs', $data);
            $this->load->view('tamplate/futer', $data);
        } else {


            $this->aksi->edit();
            $this->session->set_flashdata('message', '<div class="alert alert-warning">
                data sudah di simpan !
                    </div>');
            redirect('menu/sub_menu/data_mhs');
        }
    }
    public function detai_user($id)
    {

        $data['title'] = 'User View';
        $data['user'] = $this->db->get_where('mhs', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('mhs', ['id' => $id])->row_array();
        $data['jurusan'] = ['Teknik Informatika', 'Perbaikan & Perawatan Mesin', 'Teknik Pengolahan Sawit'];

        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('menu/detai_user', $data);
        $this->load->view('tamplate/futer', $data);
    }

    public function riset_pass($id)
    {
        $pass = '123456';
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

        $this->db->set('pass', $pass_hash);
        $this->db->where('id', $id);
        $this->db->update('mhs');

        $this->session->set_flashdata('message', '<div class="alert alert-success">
        passwort di ubah ke 123456 sebagai password bawaaan !
            </div>');
        redirect('menu/sub_menu/data_mhs');
    }

    //fungsi untuk dosen
    public function hapus_dosen($id)
    {
        $this->aksi->hapus_dosen($id);
        $this->session->set_flashdata('message', '<div class="alert alert-warning">
            data sudah di hapus !
                </div>');
        redirect('menu/sub_menu/data_dosen');
    }


    public function edit_dosen($id)
    {

        $data['title'] = 'Edit Data Mahasiswa';
        $data['user'] = $this->db->get_where('mhs', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('dosen', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nidn', 'nidn', 'required');
        $this->form_validation->set_rules('nrp', 'nrp', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('menu/edit_dosen', $data);
            $this->load->view('tamplate/futer', $data);
        } else {
            //cek gambar kalo ada
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/gambar_profil/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '10000';

                $this->load->library('upload', $config);

                $old_image = $data['dosen']['image'];
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

            $this->aksi->edit_dosen();
            $this->session->set_flashdata('message', '<div class="alert alert-warning">
                data sudah di simpan !
                    </div>');
            redirect('menu/sub_menu/data_dosen');
        }
    }
    public function detai_dosen($id)
    {



        $data['title'] = 'User View';
        $data['user'] = $this->db->get_where('mhs', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('dosen', ['id' => $id])->row_array();

        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('menu/detai_dosen', $data);
        $this->load->view('tamplate/futer', $data);
    }

    public function riset_pass_dosen($id)
    {
        $pass = '123456';
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

        $this->db->set('pass', $pass_hash);
        $this->db->where('id', $id);
        $this->db->update('dosen');
        $this->session->set_flashdata('message', '<div class="alert alert-success">
        passwort di ubah ke 123456 sebagai password bawaaan !
            </div>');
        redirect('menu/sub_menu/data_mhs');
    }



    //class
    public function detai_class($id)
    {
        $data['title'] = 'User View';
        $data['user'] = $this->db->get_where('mhs', ['email' => $this->session->userdata('email')])->row_array();
        $data['class'] = $this->db->get_where('class', ['id' => $id])->row_array();


        $this->load->view('tamplate/heder', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('menu/detai_class', $data);
        $this->load->view('tamplate/futer', $data);
    }
    public function hapus_class($id)
    {
        $this->aksi->hapus_class($id);
        $this->session->set_flashdata('message', '<div class="alert alert-warning">
            data sudah di hapus !
                </div>');
        redirect('menu/sub_menu/class');
    }

    public function edit_class($id)
    {

        $data['title'] = 'Edit Data Mahasiswa';
        $data['user'] = $this->db->get_where('mhs', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('class', ['id' => $id])->row_array();

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('thn', 'thn', 'required');
        $this->form_validation->set_rules('jmlh_mhs', 'jmlh_mhs', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('menu/edit_class', $data);
            $this->load->view('tamplate/futer', $data);
        } else {
            $this->aksi->edit_class();
            $this->session->set_flashdata('message', '<div class="alert alert-warning">
                data sudah di simpan !
                    </div>');
            redirect('menu/sub_menu/class');
        }
    }


    public function edit_makul($id)
    {

        $data['title'] = 'Edit Data Mata Kuliah';
        $data['user'] = $this->db->get_where('mhs', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('mata_kuliah', ['id' => $id])->row_array();
        $data['jurusan'] = ['Teknik Informatika', 'Perbaikan & Perawatan Mesin', 'Teknik Pengolahan Sawit'];

        $this->form_validation->set_rules('mata_kuliah', 'mata_kuliah', 'required');
        $this->form_validation->set_rules('prodi', 'prodi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('menu/edit_makul', $data);
            $this->load->view('tamplate/futer', $data);
        } else {
            $this->aksi->edit_makul();
            $this->session->set_flashdata('message', '<div class="alert alert-warning">
                data sudah di simpan !
                    </div>');
            redirect('menu/rekap/makul');
        }
    }

    public function hapus_makul($id)
    {
        $this->aksi->hapus_makul($id);
        $this->session->set_flashdata('message', '<div class="alert alert-warning">
            data sudah di hapus !
                </div>');
        redirect('menu/rekap/makul');
    }
}
