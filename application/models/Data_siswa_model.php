<?php
class Data_siswa_model extends CI_Model
{

    public function tampil()
    {
        return $this->db->get('siswa')->result_array();
    }
    public function tampil_data()
    {
        
        return $this->db->get('v_siswa')->result_array();
    }

    public function simpan()
    {
        $data = [

            "nis" => $this->input->post('nis'),
            "nama" => $this->input->post('nama'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "no_tlp" => $this->input->post('no_tlp'),
            "email" => $this->input->post('email'),
            "id_kelas" => $this->input->post('kelas'),
            "jurusan" => $this->input->post('jurusan'),
            "id_angkatan" => $this->input->post('angkatan'),
            "username" => $this->input->post('username'),
            "password" => sha1($this->input->post('pass1')),
            "hak_akses" => $this->input->post('hak_akses')
        ];
        $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->insert('siswa', $data);
    }

    public function hapus($id)
    {
        $this->session->set_flashData('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->where('id_siswa', $id);
        $this->db->delete('siswa');
    }
    public function get_id($id)
    {
        
        return $this->db->get_where('v_siswa', ['id_siswa' => $id])->row_array();
        
    }

    public function get_num($id = null)

    {
        $this->db->select('*');
        $this->db->from('v_siswa');
        if ($id != null) {
            $this->db->where('id_siswa', $id);
        }
        return $this->db->get();
    }
    public function ubah()
    {
        $pass = $this->input->post('pass1');
        $data = [
            "nis" => $this->input->post('nis'),
            "nama" => $this->input->post('nama'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "no_tlp" => $this->input->post('no_tlp'),
            "email" => $this->input->post('email'),
            "id_kelas" => $this->input->post('kelas'),
            "jurusan" => $this->input->post('jurusan'),
            "id_angkatan" => $this->input->post('angkatan'),
            "username" => $this->input->post('username'),
            "password" => sha1($this->input->post('pass1')),
            "hak_akses" => $this->input->post('hak_akses'),

        ];
        if ($pass != null) { //jika input password tidak kosong maka yang disimpan password baru
            $data = [
                "nis" => $this->input->post('nis'),
            "nama" => $this->input->post('nama'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "no_tlp" => $this->input->post('no_tlp'),
            "email" => $this->input->post('email'),
            "id_kelas" => $this->input->post('kelas'),
            "jurusan" => $this->input->post('jurusan'),
            "id_angkatan" => $this->input->post('angkatan'),
            "username" => $this->input->post('username'),
            "password" => sha1($this->input->post('pass1')),
            "hak_akses" => $this->input->post('hak_akses'),
                
                
            ];
        }
        $this->session->set_flashData('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        $this->db->where('id_siswa', $this->input->post('id'));
        $this->db->update('siswa', $data);
    }

    public function ubah1()
    {
        $pass = $this->input->post('pass1');
        $data = [
            "nis" => $this->input->post('nis'),
            "nama" => $this->input->post('nama'),
            "username" => $this->input->post('username'),
            "password" => sha1($this->input->post('pass1')),
            "hak_akses" => $this->input->post('hak_akses'),

        ];
        if ($pass != null) { //jika input password tidak kosong maka yang disimpan password baru
            $data = [
                "nis" => $this->input->post('nis'),
            "nama" => $this->input->post('nama'),
            "username" => $this->input->post('username'),
            "password" => sha1($this->input->post('pass1')),
            "hak_akses" => $this->input->post('hak_akses'),
                
                
            ];
        }
        $this->session->set_flashData('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        $this->db->where('id_siswa', $this->input->post('id'));
        $this->db->update('siswa', $data);
    }
    public function usernamecek($username, $id)
    {
        $this->db->where('username =', $username);
        $this->db->where('id_siswa !=', $id);
        $cek = $this->db->get('siswa')->num_rows();
        return $cek;
    }

    public function masuk($post)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('username', $post['user_name']);
        $this->db->where('password', sha1($post['pass']));
        return $this->db->get();
    }

    public function get($id = null)

    {
        $this->db->select('*');
        $this->db->from('siswa');
        if ($id != null) {
            $this->db->where('id_siswa', $id);
        }
        return $this->db->get();
    }
    public function get_($id = null)

    {
        
        $this->db->from('siswa');
        if ($id != null) {
            $this->db->where('id_siswa', $id);
        }
        return $this->db->get();
    }

   

    public function update_status(){
        
        
        $data=[
            "status" => $this->input->post('status'),
        ];
        
        $this->db->where('id_siswa', $this->input->post('id'));
        return $this->db->update('siswa',$data);

    }

    function validateEmail($email){
        $query = $this->db->query("SELECT * FROM siswa WHERE email='$email'");
        if($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
    }

    

    function checkUser($email,$password)
	{
		$query = $this->db->query("SELECT * from siswa where email='$email' AND password='$password'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function checkCurrentPassword($currentPassword)
	{
		$userid = $this->session->userdata('LoginSession')['id'];
		$query = $this->db->query("SELECT * from siswa WHERE id='$userid' AND password='$currentPassword' ");
		if($query->num_rows()==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updatePassword($password)
	{
		$userid = $this->session->userdata('LoginSession')['id'];
		$query = $this->db->query("update  siswa set password='$password' WHERE id='$userid' ");
		
	}

	

	function updatePasswordhash($data,$email)
	{
		$this->db->where('email',$email);
		$this->db->update('siswa',$data);
	}
	
	function getHahsDetails($hash)
	{
		$query =$this->db->query("select * from siswa WHERE hash_key='$hash'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}

	}

	function validateCurrentPassword($currentPassword,$hash)
	{
		$query = $this->db->query("SELECT * FROM siswa WHERE password='$currentPassword' AND hash_key='$hash'");
		if($query->num_rows()==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updateNewPassword($data,$hash)
	{
		$this->db->where('hash_key',$hash);
		$this->db->update('siswa',$data);
	}
}
