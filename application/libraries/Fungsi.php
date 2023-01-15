<?php
//untuk menampilkan data user berdasarkan id session
class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('Data_petugas_model');
        $id = $this->ci->session->userdata('id_petugas');
        $user_data = $this->ci->Data_petugas_model->get($id)->row();
       
        return $user_data;
       
    }

    function user_login1()
    {
        $this->ci->load->model('Data_siswa_model');
        $id = $this->ci->session->userdata('id_siswa');
        $user_data = $this->ci->Data_siswa_model->get($id)->row();
        return $user_data;
    }
    
    
    function user_()
    {
        $this->ci->load->model('Data_siswa_model');
        $id_siswa = $this->ci->session->userdata('id_siswa');
        $user_data = $this->ci->Data_siswa_model->get_($id_siswa)->row();
        return $user_data;
    }
    function siswa()
    {
        $this->ci->load->model('Data_siswa_model');
        $id = $this->ci->session->userdata('id_siswa');
        $user_data = $this->ci->Data_siswa_model->get($id)->row();
        return $user_data;
    }

    function siswa_home()
    {
        $this->ci->load->model('Data_siswa_model');
        $id = $this->ci->session->userdata('id_siswa');
        $user_data = $this->ci->Data_siswa_model->get_num($id)->row();
        return $user_data;
    }

    function bulan_teakhir()
    {
        $this->ci->load->model('Pembayaran_spp_model');
        $id = $this->ci->session->userdata('invoice_spp');
        $user_data = $this->ci->Pembayaran_spp_model->get_num($id)->row();
        return $user_data;
    }

    function get_sum()
    {
        $this->ci->load->model('Pembayaran_spp_model');
        $id = $this->ci->session->userdata('invoice_spp');
        $user_data = $this->ci->Pembayaran_spp_model->get_sum()->row_array();
        return $user_data;
    }

    function kelas()
    {
        $this->ci->load->model('Data_kelas_model');
        $id = $this->ci->session->userdata('id_kelas');
        $user_data = $this->ci->Data_kelas_model->get($id)->row();
        return $user_data;
    }
    public function count_siswa()
    {
        $this->ci->load->model('Data_siswa_model');
        return $this->ci->Data_siswa_model->get()->num_rows();
    }
    public function count_kelas()
    {
        $this->ci->load->model('Data_kelas_model');
        
        return $this->ci->Data_kelas_model->get()->num_rows();
    }

    public function count_transaksi()
    {
        $this->ci->load->model('Pembayaran_spp_model');

        return $this->ci->Pembayaran_spp_model->get()->num_rows();
    }

    
}