<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class DosenApi extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Coba_mode', 'coba');
    }


    public function login_post()
    {
        $email = $this->post('email');
        $pass = $this->post('pass');
        if ($user = $this->db->get_where('dosen', ['email' => $email])->row_array()) {

            if (password_verify($pass, $user['pass'])) {
                $this->response([
                    'status' => false,
                    'message' => 'data dosen',
                    'data' => $user
                ], 200);
            } else {
                $this->response([
                    'status' => true,
                    'message' => 'password salah',
                ], 404);
            }
        } else {
            $this->response([
                'status' => true,
                'message' => 'user tidak terdaftar',
            ], 404);
        }
    }

    public function tambahClass()
    {
        $data = [
            'id_class' => $this->post('id_class'),
            'nrp_dosen' => $this->post('nrp_dosen'),
            'name' => $this->post('name'),
            'thn' => $this->post('thn'),
            'mata_pelajaran' => $this->post('mata_pelajaran'),
            'jmlh_mhs' => $this->post('jlmh_mhs'),
        ];
        if ($this->coba->add_class($data) > 0) {
            $this->response([
                'error' => true,
                'message' => 'data di tambah',
            ], 200);
        } else {
            $this->response([
                'error' => false,
                'message' => 'data gagal di tambah',
            ], 404);
        }
    }

    public function absen_dosen()
    {
        date_default_timezone_set('asia/jakarta');
        $waktu = date("H:i:s");
        $telat = '08:15:00';
        if ($waktu >= $telat) {
            $waktuMsk = 'terlambat';
            $waktuDtg = 'anda masuk dengan terlambat ';
        } else {
            $waktuMsk = 'masuk';
            $waktuDtg = 'anda masuk dengan tepat waktu';
        }
        $data = [

            'nrp_dosen' => $this->post('nrp_dosen'),
            'id_class' => $this->post('id_class'),
            'jam' => date("H:i:s"),
            'tgl' => date("d/m/Y"),
            'keterangan' => $waktuMsk
        ];
        if ($this->coba->absen_dosen($data) > 0) {
            $this->response([
                'error' => true,
                'message' => $waktuDtg,
            ], 200);
        } else {
            $this->response([
                'error' => false,
                'message' => 'data gagal untuk absen',
            ], 404);
        }
    }

    public function tampilClass_post()
    {

        $nrp = $this->post('nrp_dosen');

        if ($data = $this->db->get_where('class', ['nrp_dosen' => $nrp])->result_array()) {
            $this->response([
                'error' => true,
                'message' => 'data class anda',
                'data' => $data,
            ], 200);
        } else {
            $this->response([
                'error' => false,
                'message' => 'data kosong',
            ], 404);
        }
    }
}
