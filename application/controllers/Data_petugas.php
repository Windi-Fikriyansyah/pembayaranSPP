<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_not_login();
        
        $this->load->model('Data_petugas_model');
        $this->load->model('Data_siswa_model');
    }
    public function index()
    {
        cek_admin();
        $data['judul'] = "Petugas";

        $data['petugas'] = $this->Data_petugas_model->tampil_data();
       
        $this->load->view('templates/header', $data);
        $this->load->view('data_petugas/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        cek_admin();
        $data['judul']="Petugas";
        $data['petugas'] = $this->Data_petugas_model->tampil_data();
        $data['siswa'] = $this->Data_siswa_model->tampil();

        
        $this->form_validation->set_rules('nama_petugas','nama_petugas','required|trim');
        $this->form_validation->set_rules('email','email','required|trim|valid_email');
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
        

        if ($this->form_validation->run() == FALSE){
            
        $this->load->view('templates/header',$data);
        $this->load->view('data_petugas/tambah',$data);
        $this->load->view('templates/footer');
    }
       else{
            $this->Data_petugas_model->simpan();
            redirect('data_petugas');
        }
        
    

    }

    public function hapus($id)
    {
        $this->Data_petugas_model->hapus($id);
        redirect('data_petugas');
    }



    public function ubah($id= '')
    {
        
        $data['judul'] = "Petugas";
        $data['siswa'] = $this->Data_siswa_model->tampil();
        $data_petugas = $this->Data_petugas_model->get_id($id);
        $data['ubah_petugas'] = $this->Data_petugas_model->get_id($id);

        $this->form_validation->set_rules('nama_petugas', 'nama_petugas', 'required|trim');
        $this->form_validation->set_rules('email','email','required|trim|valid_email');
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
            if ($data_petugas > 0) {
                $data['ubah_petugas'] = $this->Data_petugas_model->get_id($id);
                $this->load->view('templates/header', $data);
                $this->load->view('data_petugas/ubah', $data);
                $this->load->view('templates/footer');
            } else {
                $pesan = "Data tidak ditemukan";
                $url = base_url('data_petugas');
                echo "<script>
        alert('$pesan');
        location='$url';
    </script>";
            }
        } else {
            $this->Data_petugas_model->ubah();
            $pesan = "Data berhasil diupdate";
            $url = base_url('data_petugas');
            echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
        }
    }

    
}
