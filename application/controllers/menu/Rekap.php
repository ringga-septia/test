<?php

use Dompdf\Renderer;
use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{
    public function index()
    {
        $this->load->view('pdf/rekappdf');
    }


    public function semester()
    {

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('welcome_message', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();




        // $this->load->library('Pdfgenerator');


        // $this->pdfgenerator->setPaper('A4', 'potrait');
        // $this->pdfgenerator->filename = "laporan-data-siswa.pdf";
        // $this->pdfgenerator->load_view('pdf/semesterpdf');
    }

    public function makul()
    {
        $data['title'] = 'Mata Kuliah';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['dosen'] = $this->db->get('dosen')->result_array();
        $data['jurusan'] = ['Teknik Informatika', 'Perbaikan & Perawatan Mesin', 'Teknik Pengolahan Sawit'];
        $data['makul'] = $this->db->get('mata_kuliah')->result_array();

        $this->form_validation->set_rules('makul', 'makul', 'required');
        $this->form_validation->set_rules('prodi', 'prodi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/heder', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('pdf/makul', $data);
            $this->load->view('tamplate/futer', $data);
        } else {
            $data = [
                'mata_kuliah' => $this->input->post('makul'),
                'prodi' => $this->input->post('prodi'),

            ];
            $this->db->insert('mata_kuliah', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">
                data sudah di simpan !
                    </div>');
            redirect('menu/rekap/makul');
        }
    }
}
