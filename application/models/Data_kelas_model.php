<?php
class Data_kelas_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('kelas')->result_array();
    }

    public function simpan()
    {
        $data = [
            "nama_kelas" => $this->input->post('nama_kelas')
        ];
        $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->insert('kelas', $data);
    }

    public function hapus($id)
    {
        $this->session->set_flashData('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->where('id', $id);
        $this->db->delete('kelas');
    }
    public function get_id($id)
    {
        return $this->db->get_where('kelas', ['id' => $id])->row_array();
    }

    public function ubah()
    {
        $data = [
            "nama_kelas" => $this->input->post('nama_kelas')
        ];
        $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Diupdate</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kelas', $data);
    }

    public function get($id = null)

    {
        $this->db->select('*');
        $this->db->from('kelas');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        return $this->db->get();
    }
}
