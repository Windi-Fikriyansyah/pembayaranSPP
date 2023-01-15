<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_admin extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        // cek_not_login();
        
       
        $this->load->model('Lap_transaksi_model');
    }

    public function index()
    {
        $data['judul']="Laporan transaksi";
        $this->load->view('templates/header',$data);
        $this->load->view('laporan_admin/index');
        $this->load->view('templates/footer');
    }

    public function lap_transaksi()
    {
        $data['judul']="Laporan transaksi";
        
        $tgl_mulai = str_replace('/', '-', $this->input->post('tgl_mulai'));
		$tgl_ambil = str_replace('/', '-', $this->input->post('tgl_ambil'));

        $data['tgl_awal'] = $tgl_mulai;
        $data['tgl_akhir'] = $tgl_ambil;
        $data['lap_transaksi'] = $this->Lap_transaksi_model->Laporan_admin($tgl_mulai, $tgl_ambil);
        $data['grand_total'] = $this->Lap_transaksi_model->grand_total($tgl_mulai, $tgl_ambil);
        
        $this->load->view('templates/header',$data);
        $this->load->view('laporan_admin/lap_transaksi',$data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_transaksi()
    {
        $data['judul']="Laporan transaksi";

       

        if (!$this->uri->segment(3) && !$this->uri->segment(4)) {
			$tgl_mulai = str_replace('/', '-', $this->input->post('tgl_mulai'));
			$tgl_ambil = str_replace('/', '-', $this->input->post('tgl_ambil'));
		} else {
			$tgl_mulai = $this->uri->segment(3);
			$tgl_ambil = $this->uri->segment(4);
		}
		$tgl_awal = str_replace('-', '/', $tgl_mulai);
		$tgl_akhir = str_replace('-', '/', $tgl_ambil);

        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['lap_transaksi'] = $this->Lap_transaksi_model->Laporan_admin($tgl_mulai, $tgl_ambil);
        $data['grand_total'] = $this->Lap_transaksi_model->grand_total($tgl_awal, $tgl_akhir);
        
        $this->load->view('laporan_admin/cetak_laporan_transaksi',$data);
    }

    // public function detail($id)
    // {
    //     $data['judul'] = "Detail transaksi";
    //     $data['cetak'] = $this->Lap_transaksi_model->get_transaksi($id);
    //     $data['detail'] = $this->Lap_transaksi_model->get_detail($id);
    //     $this->load->view('templates/header',$data);
    //     $this->load->view('laporan_transaksi/detail',$data);
    //     $this->load->view('templates/footer');
    // }

}