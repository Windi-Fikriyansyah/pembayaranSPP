<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_spp extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model(['Pembayaran_spp_model']);
        $this->load->model(['Data_siswa_model']);
        $this->load->model(['Data_petugas_model']);
        $this->load->model(['Data_kelas_model']);
    }

    
    public function index()
    {
        $data['judul'] = "Transaksi";

        

        
       $data['data_siswa'] = $this->Data_siswa_model->tampil_data();
        
       
        $this->load->view('templates/header', $data);
        $this->load->view('pembayaran/tampil', $data);
        $this->load->view('templates/footer');
    }

    public function pembayaran()
    {
        $data['judul'] = "Transaksi";
        $id = $this->uri->segment(3);


        $tampil = $this->Pembayaran_spp_model->no_otomatis();
        if (empty($tampil[0]['invoice_spp'])) {
            $no = "INV-" . "000001";
        } else {
            $ket = "INV-";
            $urut = $tampil[0]['invoice_spp'];
            $no1 = substr($urut, 4, 6);
            $hsl = ((int) $no1) + 1;
            $hasil = sprintf('%06s', $hsl);
            $no = $ket . $hasil;
        }

        $data['data_siswa'] = $this->Pembayaran_spp_model->tampil_id($id);
        $data['data_pembayaran'] = $this->Pembayaran_spp_model->tampil();
       
        $data['siswa'] = $this->Pembayaran_spp_model->tampil_siswa($id);

        $this->form_validation->set_rules('nominal', 'Total Pembayaran', 'required|trim');
        $this->form_validation->set_rules('bulan', 'Bulan', 'required|trim');
        $this->form_validation->set_rules('tgl_sewa', 'Tgl Pembayaran', 'required|trim');
        $this->form_validation->set_rules('siswa', 'Nama Siswa', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pembayaran/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pembayaran_spp_model->simpan($no);
            redirect(base_url('pembayaran_spp/cetak/').$no);
        }
    }

    public function data_pembayaran()
    {
        $data['data_pembayaran'] = $this->Pembayaran_spp_model->tampil();
        $this->load->view('templates/header', $data);
        $this->load->view('pembayaran/data_pembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->Pembayaran_spp_model->hapus($id);
        redirect('pembayaran_spp/data_pembayaran');
    }

    public function ubah($id)
    {
        $data['judul'] = "Data Pembayaran";
        $data_pembayaran = $this->Pembayaran_spp_model->get_id($id);
        $data['ubah_pembayaran'] = $this->Pembayaran_spp_model->get_id($id);
        
        $this->form_validation->set_rules('bulan', 'Bulan', 'required|trim');
        
        
        if ($this->form_validation->run() == FALSE) {
            if ($data_pembayaran > 0) {
                $data['ubah_pembayaran'] = $this->Pembayaran_spp_model->get_id($id);
                $this->load->view('templates/header', $data);
                $this->load->view('pembayaran/ubah', $data);
                $this->load->view('templates/footer');
            } else {
                $pesan = "Data tidak ditemukan";
                $url = base_url('pembayaran');
                echo "<script>
        alert('$pesan');
        location='$url';
    </script>";
            }
        } else {
            $this->Pembayaran_spp_model->ubah();
            $pesan = "Data berhasil diupdate";
            $url = base_url('pembayaran_spp/data_pembayaran');
            echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
        }
    }

    public function cetak()
{
  
    $tampil= $this->Pembayaran_spp_model->no_otomatis();
    $id=$tampil[0]['invoice_spp'];
    
    $data['cetak'] = $this->Pembayaran_spp_model->get_pembayaran($id);

    $data['grand_total'] = $this->Pembayaran_spp_model->grand_total();
    $this->load->view('pembayaran/cetak', $data); 
  
}
}
