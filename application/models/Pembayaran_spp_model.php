<?php
class Pembayaran_spp_model extends CI_Model
{
  public function no_otomatis()
  {
    $this->db->select('invoice_spp');
    $this->db->order_by('invoice_spp DESC');
    return $this->db->get('pembayaran_spp')->result_array();
  }

  public function tampil()
  {
    return $this->db->get('v_pembayaran')->result_array();
  }

  public function tampil_id($id)
  {
    
    $this->db->order_by('invoice_spp', 'asc');
    return $this->db->get_where('v_pembayaran', ['kd_siswa' => $id])->result_array();
  }

  public function tampil_siswa($id)
  {
    
    
    return $this->db->get_where('v_siswa', ['id_siswa' => $id])->result_array();
  }

  public function get_num($id = null)

    {
        $this->db->select('*');
        $this->db->from('v_pembayaran');
        $this->db->order_by('invoice_spp', 'desc');
        $this->db->limit(1);
        if ($id != null) {
            $this->db->where('kd_siswa', $id);
        }
        return $this->db->get();
    }

    public function get_sum()
{$this->db->select_sum('grand_total');
  return $this->db->get_where('v_pembayaran', ['kd_siswa'])->row_array();
      }
  
  public function simpan($no)
  {
    $data = [
      "invoice_spp" => $no,
      "kd_petugas" => $this->fungsi->user_login()->id_petugas,
      
      "kd_siswa" => $this->input->post('siswa'),
      "tanggal" => $this->input->post('tgl_sewa'),
      "bulan" => $this->input->post('bulan'),
      "grand_total" => $this->input->post('nominal'),

    ];
    $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      $this->db->where('id_siswa', $this->input->post('id'));
    $this->db->insert('pembayaran_spp', $data);
  }

  public function hapus($id)
  {
    $this->db->where('invoice_spp', $id);
    $this->db->delete('pembayaran_spp');
    $this->session->set_flashData('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
  }

  

  

  public function bayar()
  {

    $jumlah_hari = $this->input->post('hari') + $this->input->post('tambahan_hari');
    $total_harga = $this->input->post('ttl') + $this->input->post('tambahan');
    $total_bayar = $this->input->post('ttl_byr') + $this->input->post('bayar');
    $sisa = $total_harga - $total_bayar;
    if ($total_bayar != $total_harga) {
      $this->session->set_flashData('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Pembayaran Gagal, Pembayaran melebihi total harga</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    } else if ($total_bayar < $total_harga) {
      $this->session->set_flashData('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Pembayaran Gagal, Pembayaran kurang dari total harga</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    } else {

      $data = [
        "tgl_kembali" => $this->input->post('tgl_pengembalian'),
        "jumlah_sewa" => $jumlah_hari,
        "total_harga" => $total_harga,
        "total_bayar" => $total_bayar,
        "sisa_pembayaran" => $sisa,
        "status" => 0,
      ];
      $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Pembayaran Berhasil Ditambahkan</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      $this->db->where('id_rental', $this->input->post('id'));
      $this->db->update('penyewaan', $data);
    }
  }

  
  public function get_id($id)
    {
        return $this->db->get_where('pembayaran_spp', ['invoice_spp' => $id])->row_array();
    }
    public function get_pembayaran($id)
    {
        return $this->db->get_where('v_pembayaran', ['invoice_spp'=>$id])->result_array($id);
        return $this->db->get('v_pembayaran')->result_array();
    }
   
    public function ubah()
    {
        $data = [
        
      
      "bulan" => $this->input->post('bulan'),
      
          
          
        ];
        $this->db->where('invoice_spp', $this->input->post('id'));
        $this->db->update('pembayaran_spp', $data);
    }

    public function laporan_admin()
    {
        
        return $this->db->get_where('v_pembayaran', ['invoice_spp '])->result_array();
        
    }
    public function grand_total(){
        $this->db->select('SUM(grand_total) as grand_total');
        
        return $this->db->get('pembayaran_spp')->row()->grand_total;
    }
  
    public function get($id = null)

    {
        $this->db->select('*');
        $this->db->from('v_pembayaran');
        if ($id != null) {
            $this->db->where('invoice_spp', $id);
        }
        return $this->db->get();
    }
}
