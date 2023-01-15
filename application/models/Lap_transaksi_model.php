<?php
class Lap_transaksi_model extends CI_Model{

    public function total_perhari(){
        $tgl=date('Ymd');
        $this->db->select('SUM(grand_total) as total_hari');
        return $this->db->get_where('pembayaran_spp',['tanggal'=>$tgl])->row()->total_hari;
    }

    public function total_perbulan(){
        $tgl=date('m');
        $this->db->select('SUM(grand_total) as total_bulan');
        $this->db->where('MONTH(tanggal)',$tgl);
        return $this->db->get('pembayaran_spp')->row()->total_bulan;
    }

    public function grand_total($tgl_awal, $tgl_akhir){
        $this->db->select('SUM(grand_total) as grand_total');
        $this->db->where('tanggal >=', $tgl_awal);
        $this->db->where('tanggal <=', $tgl_akhir);
        return $this->db->get('pembayaran_spp')->row()->grand_total;
    }

    public function laporan_admin($tgl_mulai, $tgl_ambil)
    {
        $this->db->where('tanggal >=', $tgl_mulai);
        $this->db->where('tanggal <=', $tgl_ambil);
        return $this->db->get('v_pembayaran')->result_array();
    }

    public function laporan_detail_transaksi($id)
    {
        $this->db->where('invoice_spp', $id);
        return $this->db->get('v_pembayaran')->result_array();
    }

    

    
}