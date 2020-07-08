<?php

class Aksi extends CI_Model
{
    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mhs');
    }

    public function hapus_dosen($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('dosen');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('mhs', ['id' => $this->input->post('id')])->row_array();
        //cek gamar kalo ada
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['upload_path'] = './assets/gambar_profil/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '10000';

            $this->load->library('upload', $config);

            $old_image = $data['user']['image'];
            if ($old_image != 'defaul.jpg') {
                unlink(FCPATH . 'assets/gambar_profil/mhs' . $old_image);
            }

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = [
            'nim' => $this->input->post('nim'),
            'name' => $this->input->post('name'),
            'prodi' => $this->input->post('prodi'),
            'semester' => $this->input->post('semester'),
            'thn' => $this->input->post('thn'),
            'image' => $new_image
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mhs', $data);
    }

    public function edit_dosen()
    {
        $data = [
            'nidn' => $this->input->post('nidn'),
            'nama' => $this->input->post('nama'),
            'nrp' => $this->input->post('prodi'),
            'jabatan' => $this->input->post('jabatan'),
            'Keterangan' => $this->input->post('thn')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('dosen', $data);
    }

    public function hapus_class($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('class');
    }

    public function edit_class()
    {
        $data = [
            'name' => $this->input->post('name'),
            'thn' => $this->input->post('thn'),
            'jmlh_mhs' => $this->input->post('jmlh_mhs'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('class', $data);
    }

    public function hapus_makul($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mata_kuliah');
    }
    public function edit_makul()
    {
        $data = [
            'mata_kuliah' => $this->input->post('mata_kuliah'),
            'prodi' => $this->input->post('prodi')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mata_kuliah', $data);
    }
}
