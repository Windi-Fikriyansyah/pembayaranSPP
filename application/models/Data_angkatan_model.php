<?php
class Data_angkatan_model extends CI_Model{

    public function tampil_data(){
        return $this->db->get('angkatan')->result_array();
    }
    public function no_otomatis()
    {
        $this->db->select('nis');
        $this->db->order_by('id_angkatan DESC');
        return $this->db->get('angkatan')->result_array();
    }
    public function simpan()
    {
        $data=[
            
            "tahun" => $this->input->post('tahun'),
            "nominal" => $this->input->post('nominal')
        ];
        $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->insert('angkatan',$data);
    }

    public function hapus($id)
    {
        $this->session->set_flashData('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->where('id_angkatan',$id);
        $this->db->delete('angkatan');
    }
    public function get_id($id)
    {
        return $this->db->get_where('angkatan',['id_angkatan'=>$id])->row_array();
    }

    public function ubah()
    {
        $data=[
            
            "tahun" => $this->input->post('tahun'),
            "nominal" => $this->input->post('nominal')
        ];
        $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Diupdate</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->where('id_angkatan', $this->input->post('id'));
        $this->db->update('angkatan',$data);
    }

    public function get($id = null)

{
    $this->db->select('*');
    $this->db->from('angkatan');
    if($id != null)
    {
        $this->db->where('id_angkatan',$id);
    }
    return $this->db->get();
}
}