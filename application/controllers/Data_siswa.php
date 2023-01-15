<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model('Data_siswa_model');
        $this->load->model('Data_kelas_model');
        $this->load->model('Data_angkatan_model');
    }
    public function index()
    {
        cek_admin1();
        $data['judul'] = "Data Siswa";

        $data['data_siswa'] = $this->Data_siswa_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('data_siswa/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul'] = "data siswa";
        $data['kelas'] = $this->Data_kelas_model->tampil_data();
        $data['angkatan'] = $this->Data_angkatan_model->tampil_data();
        $data['data_siswa'] = $this->Data_siswa_model->tampil_data();
        $this->form_validation->set_rules('nis', 'nis', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('no_tlp', 'no_tlp', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('kelas', 'kelas', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim');
        $this->form_validation->set_rules('angkatan', 'angkatan', 'required|trim');
        $this->form_validation->set_rules('username','Username',
        'required|trim');
        $this->form_validation->set_rules('pass1','Password',
        'min_length[5]|matches[pass2]',[
            'min_length' => "Password minimal 5 digit",
            'matches' => "Password tidak sesuai"
        ]);
        $this->form_validation->set_rules('pass2','Konfirmasi Password',
        'matches[pass1]',
        ['matches' => "Konfirmasi Password tidak sesuai"]);
        $this->form_validation->set_rules('hak_akses','hak_akses','required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('data_siswa/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Data_siswa_model->simpan();
            redirect('data_siswa');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->Data_siswa_model->hapus($id);
        redirect('Data_siswa');
    }

    public function ubah($id='')
    {
        $data['judul'] = "Data Siswa";
        $data['kelas'] = $this->Data_kelas_model->tampil_data();
        $data['angkatan'] = $this->Data_angkatan_model->tampil_data();
        $data_siswa = $this->Data_siswa_model->get_id($id);
        $data['ubah_siswa'] = $this->Data_siswa_model->get_id($id);

        $this->form_validation->set_rules('nis', 'nis', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required|trim');
        $this->form_validation->set_rules('no_tlp', 'no_tlp', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('kelas', 'kelas', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim');
        $this->form_validation->set_rules('angkatan', 'angkatan', 'required|trim');
        $this->form_validation->set_rules(
            'username',
            'username',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'pass1',
            'Password',
            'min_length[5]|matches[pass2]',
            [
                'min_length' => "Password minimal 5 digit",
                'matches' => "Password tidak sesuai"
            ]
        );
        $this->form_validation->set_rules(
            'pass2',
            'Konfirmasi Password',
            'matches[pass1]',
            ['matches' => "Konfirmasi Password tidak sesuai"]
        );
        $this->form_validation->set_rules('hak_akses', 'hak_akses', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            if ($data_siswa > 0) {
                $data['ubah_siswa'] = $this->Data_siswa_model->get_id($id);
                $this->load->view('templates/header', $data);
                $this->load->view('data_siswa/ubah', $data);
                $this->load->view('templates/footer');
            } else {
                $pesan = "Data tidak ditemukan";
                $url = base_url('data_siswa');
                echo "<script>
        alert('$pesan');
        location='$url';
    </script>";
            }
        } else {
            $this->Data_siswa_model->ubah();
            $pesan = "Data berhasil diupdate";
            $url = base_url('data_siswa');
            echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
        }
    }

    public function ubah_status(){
        $this->Data_siswa_model->update_status();
        redirect('data_siswa');
    }
}
