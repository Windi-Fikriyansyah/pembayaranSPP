<?php

class Laporan_model extends CI_Model
{
    public function tampil()
    {
        $id=$this->fungsi->user_login1()->id_siswa;
        return $this->db->get_where('v_pembayaran', ['kd_siswa' => $id])->result_array();
    }

   
    
        public function tampil_kelas()
        {
            $id = $this->fungsi->user_login1()->id_siswa;
            $this->db->where('id_kelas', $this->input->post('pilih'));
            return $this->db->get_where('v_pembayaran', ['kd_siswa' => $id])->result_array();
        }

    public function tampil_id()
    {
       
        return $this->db->get('kelas')->result_array();
    }

    public function nomor()
    {
        $this->db->select('invoice_spp');
        $this->db->order_by('invoice_spp DESC');
        return $this->db->get('pembayaran_spp')->result_array();
    }

    public function simpan($no)
    {
        $tgl = date('Y-m-d');
        $bln = date('F');
        $data = [
            "invoice_spp" => $no,
            "tanggal" => $tgl,
            "bulan" => $bln,
            "kd_siswa" => $this->input->post('id_siswa'),
            "grand_total" => $this->input->post('total'),
            "kd_petugas" => $this->fungsi->user_login()->id_petugas
        ];
        $this->db->insert('pembayaran_spp', $data);
    }

    public function hapus($id)
    {
        $this->db->where('invoice_spp', $id);
        $this->db->delete('pembayaran_spp');
    }

    public function get_id($id)
    {
        return $this->db->get_where('v_pembayaran_spp', ['invoice_spp' => $id])->row_array();
    }

    public function laporan_admin()
    {
        $id=$this->fungsi->user_login1()->id_siswa;
        return $this->db->get_where('v_pembayaran', ['kd_siswa' => $id])->result_array();
        return $this->db->get('v_pembayaran')->result_array();
    }
    public function grand_total(){
        $this->db->select('SUM(grand_total) as grand_total');
        
        return $this->db->get('pembayaran_spp')->row()->grand_total;
    }
    
    public function ubah()
    {   //untuk menampilkan detail data dan menangkap data per ID yg di panggil
        $data = [
            "invoice_spp" => $this->input->post('invoice'),
            "tanggal" => $this->input->post('tgl'),
            "kd_siswa" => $this->input->post('siswa'),
            "grand_total" => $this->input->post('total'),
            "kd_petugas" => $this->fungsi->admin_login()->kd_admin
        ];
        $this->db->where('invoice_spp', $this->input->post('invoice'));
        $this->db->update('tb_pembayaran_spp', $data);
    }
}
