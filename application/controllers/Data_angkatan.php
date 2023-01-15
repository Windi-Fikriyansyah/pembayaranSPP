<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_angkatan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_admin();
        $this->load->model('Data_angkatan_model');
    }
    public function index(){
    $data['judul']="Data Angkatan";

        $data['data_angkatan']=$this->Data_angkatan_model->tampil_data();

        $this->load->view('templates/header',$data);
        $this->load->view('data_angkatan/index',$data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul']="data siswa";

        $this->form_validation->set_rules('tahun','tahun','required|trim');
        $this->form_validation->set_rules('nominal','nominal','required|trim');
        

        if ($this->form_validation->run() == FALSE){
            
        $this->load->view('templates/header',$data);
        $this->load->view('data_angkatan',$data);
        $this->load->view('templates/footer');

        }else{
            $this->Data_angkatan_model->simpan();
            redirect('data_angkatan');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->Data_angkatan_model->hapus($id);
        redirect('data_angkatan');
    }

    public function ubah($id)
    {
        $data['judul']="Data Siswa";
        $data_angkatan = $this->Data_angkatan_model->get_id($id);
        $data['ubah_angkatan'] = $this->Data_angkatan_model->get_id($id);
        
        $this->form_validation->set_rules('tahun','tahun','required|trim');
        $this->form_validation->set_rules('nominal','Nominal','required|trim');
        
        if($this->form_validation->run() == FALSE)
        {
            if($data_angkatan > 0){
                $data['ubah_angkatan'] = $this->Data_angkatan_model->get_id($id);
        $this->load->view('templates/header',$data);
        $this->load->view('data_angkatan/ubah',$data);
        $this->load->view('templates/footer');
    }else {
        $pesan="Data tidak ditemukan";
    $url = base_url('data_angkatan');
    echo "<script>
        alert('$pesan');
        location='$url';
    </script>";
    }
        
    }else{
            $this->Data_angkatan_model->ubah();
            redirect('data_angkatan');
        }
    }
    }
