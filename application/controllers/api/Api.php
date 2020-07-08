<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Coba_mode', 'coba');
    }



    //Login Mhs and Dosen
    public function login_post()
    {
        $email = $this->post('email');
        $pass = $this->post('pass');

        $dosen = $this->db->get_where('dosen', ['email' => $email])->row_array();
        $mhs = $this->db->get_where('mhs', ['email' => $email])->row_array();

        if ($mhs != null) {
            if (password_verify($pass, $mhs['pass'])) {
                $this->response([
                    'message' => 'data mahasiwa',
                    'data' => $mhs,
                    'role' => '2',
                ], 200);
            } else {
                $this->response([
                    'akses' => '1',
                    'message' => 'password yang anda masukan salah',
                ], 404);
            }
        } elseif ($dosen != null) {
            if (password_verify($pass, $dosen['pass'])) {
                $this->response([
                    'message' => 'data dosen',
                    'data2' => $dosen,
                    'role' => '1',
                ], 200);
            } else {
                $this->response([
                    'akses' => '1',
                    'message' => 'password yang anda masukan salah',
                ], 404);
            }
        } else {
            $this->response([
                'akses' => '2',
                'message' => 'email tidak terdaftar',
            ], 400);
        }
    }

    //absen mahasiswa
    public function absenMhs_post()
    {
        $code = $this->post('code');

        date_default_timezone_set('asia/jakarta');
        $waktu = date("H:i:s");
        $absDosen = $this->db->get_where('absen_dosen', ['code' => $code])->row_array();


        $sekarang = date_create($waktu);
        $dosen = date_create($absDosen['jam']);
        $diff = date_diff($sekarang, $dosen);

        if ($absDosen != null) {



            if ($diff->i > 15) {
                $waktuMsk = 'terlambat';
                $waktuDtg = $diff->i;
            } else {
                $waktuMsk = 'masuk';
                $waktuDtg = 'anda masuk dengan tepat waktu';
            }
            //import ke data base absen Mahasiswa 
            //data yang harus di imputkan oleh api 
            $data = [
                'tgl' => date("Y-m-d"),
                'jam' => date("H:i:s"),
                'nim' => $this->post('nim'), //di ambil dari data user
                'prodi' => $this->post('prodi'), //di ambil dari data user
                'id_class' => $this->post('id_class'), //di ambil dari data user
                'keterangan' => $waktuMsk,
                'makul' => $absDosen['makul'],
                'code' => $this->post('code')
            ];
            if (date("Y-m-d") == $absDosen['tgl']) {
                //jika tangal absen tidak sesuai dengan absen di dosen
                $cek_absen = $this->db->get_where('absen_mhs', ['code' => $this->post('code')])->row_array();
                if ($cek_absen == null) {
                    if ($this->coba->absenMhs($data) > 0) {
                        //respose untuk absen berhasil
                        $rekap = $this->db->get_where('rekap', ['nim' => $this->post('nim'), 'makul' => $absDosen['makul']])->row_array();
                        $h = $rekap['h'] + 1;
                        $pertemuan = $rekap['pertemuan'] - 1;

                        $data2 = [
                            'h' => $h,
                            'pertemuan' => $pertemuan
                        ];
                        //update data tabel rekap
                        $this->db->set($data2);
                        $this->db->where('nim', $this->post('nim'));
                        $this->db->update('rekap');

                        $this->response([
                            'error' => true,
                            'message' => $waktuDtg,
                        ], 200);
                    } else {
                        //jika tidak maka akan absen di gagalkan
                        $this->response([
                            'error' => false,
                            'message' => 'data gagal untuk absen',
                        ], 404);
                    }
                } else {
                    //jika sudah absen
                    $this->response([
                        'error' => false,
                        'message' => 'anda sudah absen',
                    ], 404);
                }
            }
        } else {
            $this->response([
                'error' => true,
                'message' => 'data gagal untuk absen',
            ], 404);
        }
    }


    //absen dosen
    public function absenDosen_post()
    {
        date_default_timezone_set('asia/jakarta');


        $class = $this->db->get_where('class', ['id' => $this->post('id_class')])->row_array();

        $data = [
            'nrp_dosen' => $this->post('nrp_dosen'),
            'id_class' => $this->post('id_class'),
            'jam' => date("H:i:s"),
            'tgl' => date("Y-m-d"),
            'keterangan' => 'data',
            'code' => $this->post('code'),
            'makul' => $this->post('makul')
        ];

        $datCode = $this->db->get_where('absen_dosen', ['code' => $this->post('code')])->row_array();
        if ($datCode == null) {
            if ($class != null) {
                if ($this->coba->absenDosen($data) > 0) {
                    $this->response([
                        'error' => true,
                        'message' => "absen berhasil /n barcode dibuat",
                    ], 200);
                } else {
                    $this->response([
                        'error' => false,
                        'message' => 'data gagal untuk absen karna error data',
                    ], 404);
                }
            } else {
                $this->response([
                    'error' => true,
                    'message' => 'absen gagal class tidak ada',
                ], 404);
            }
        } else {
            $this->response([
                'error' => true,
                'message' => 'anda telah mengunakan cod yang sama sebelumnya',
            ], 404);
        }
    }

    public function absen_get()
    {
        $class = $this->db->get_where('absen_mhs')->row_array();
        $data = $this->db->query("SELECT mhs.`name`, `absen_mhs`.`nim`,`absen_mhs`.`prodi`,`absen_mhs`.`makul`,`absen_mhs`.`jam`,`absen_mhs`.`tgl`, `absen_mhs`.`code` FROM `mhs`,`absen_mhs` WHERE `mhs`.`nim`=`absen_mhs`.`nim`")->result_array();
        $this->response([
            'data' => $data,
            'message' => 'anda telah mengunakan cod yang sama sebelumnya',
        ], 404);
    }

    // public function tambah_post()
    // {
    //     $data = [
    //         'email' => $this->post('email'),
    //         'name' => $this->post('name'),
    //         'pass' => password_hash($this->post('pass'), PASSWORD_DEFAULT),
    //         'nim' => $this->post('nim'),
    //         'prodi' => $this->post('prodi'),
    //         'semester' => $this->post('semester'),
    //         'foto' => 'defaul.png',
    //         'is_aktif' => 1,

    //     ];


    //     if ($this->coba->tambah($data) > 0) {
    //         $this->response([
    //             'error' => true,
    //             'message' => 'data di tambah',
    //         ], 200);
    //     } else {
    //         $this->response([
    //             'error' => false,
    //             'message' => 'data gagal di tambah',
    //         ], 404);
    //     }
    // }
}
