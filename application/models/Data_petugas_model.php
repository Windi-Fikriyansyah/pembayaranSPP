<?php
class Data_petugas_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('petugas')->result_array();
    }

    public function simpan()
    {
        $data = [

            "nama_petugas" => $this->input->post('nama_petugas'),
            "email" => $this->input->post('email'),
            "username" => $this->input->post('username'),
            "password" => sha1($this->input->post('pass1')),
            "hak_akses" => $this->input->post('hak_akses'),
            
        ];
        $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->insert('petugas', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('petugas');
        $this->session->set_flashData('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    }
    public function get_id($id)
    {
        return $this->db->get_where('petugas', ['id_petugas' => $id])->row_array();
        return $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
        
    }

    
    public function usernamecek($username, $id)
    {
        $this->db->where('username =', $username);
        $this->db->where('id_petugas !=', $id);
        $cek = $this->db->get('petugas')->num_rows();
        return $cek;
    }


    public function ubah()
    {
        $pass = $this->input->post('pass1');

        $data = [
            "nama_petugas" => $this->input->post('nama_petugas'),
            "email" => $this->input->post('email'),
            "username" => $this->input->post('username'),
            "hak_akses" => $this->input->post('hak_akses'),
            
        ];

        if ($pass != null) { //jika input password tidak kosong maka yang disimpan password baru
            $data = [
                "password" => sha1($this->input->post('pass1')),
                "nama_petugas" => $this->input->post('nama_petugas'),
                "email" => $this->input->post('email'),
                "username" => $this->input->post('username'),
                "hak_akses" => $this->input->post('hak_akses'),
                
            ];
        }
        $this->session->set_flashData('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        $this->db->where('id_petugas', $this->input->post('id'));
        $this->db->update('petugas', $data);
    }

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->where('username', $post['user_name']);
        $this->db->where('password', sha1($post['pass']));
        return $this->db->get();
    }

    public function get($id = null)
    //membuat 1 fungsi untuk menampilkan semua data
    //dan menampilkan data per id/satu data
    {
        $this->db->select('*');
        $this->db->from('petugas');
        if ($id != null) {
            $this->db->where('id_petugas', $id);
        }
        return $this->db->get();
    }
}
