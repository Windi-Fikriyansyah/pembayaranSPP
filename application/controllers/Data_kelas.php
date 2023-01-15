<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_admin();
        $this->load->model('Data_kelas_model');
    }
    public function index()
    {
        $data['judul'] = "Data Kelas";

        $data['data_kelas'] = $this->Data_kelas_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('data_kelas/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul'] = "Data Kelas";
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('data_kelas/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Data_kelas_model->simpan();
            redirect('data_kelas');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->Data_kelas_model->hapus($id);
        redirect('data_kelas');
    }

    public function ubah($id)
    {
        $data['judul'] = "Data Kelas";
        $data_kelas = $this->Data_kelas_model->get_id($id);

        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            if ($data_kelas > 0) {
                $data['ubah_kelas'] = $this->Data_kelas_model->get_id($id);
                $this->load->view('templates/header', $data);
                $this->load->view('data_kelas/ubah', $data);
                $this->load->view('templates/footer');
            } else {
                $pesan = "Data tidak ditemukan";
                $url = base_url('data_kelas');
                echo "<script>
                alert('$pesan');
                location='$url';
                </script>";
            }
        } else {
            $this->Data_kelas_model->ubah();
            redirect('data_kelas');
        }
    }
}
