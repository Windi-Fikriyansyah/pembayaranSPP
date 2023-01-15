<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login(){
        cek_login();
        $this->load->view('login');
    }

    public function login1(){
        
        $this->load->view('login1');
    }

    public function login2(){
       
        $this->load->view('login2');
    }

    public function proses()
    {
        // $username->$this->input->post('Admin_name');
        $post = $this->input->post(null, TRUE);
        if(isset($post['login']))
        {
            $this->load->model('Data_petugas_model');
            $query = $this->Data_petugas_model->login($post);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $params = array(
                    'id_petugas' => $row->id_petugas,
                    'nama_petugas' => $row->nama_petugas
                );
                $this->session->set_userdata($params);
                $pesan="Anda Berhasil login";
            $url = base_url('home');
            echo "<script>
                alert('$pesan');
                location='$url';
            </script>";
        }else{
            $pesan="Username dan Password Anda Salah";
            $url = base_url('auth/login');
            echo "<script>
                alert('$pesan');
                location='$url';
            </script>";
            }
        }
    }

    public function proses1()
    {
        // $username->$this->input->post('Admin_name');
        $post = $this->input->post(null, TRUE);
        if(isset($post['masuk']))
        {
            $this->load->model('Data_siswa_model');
            $query = $this->Data_siswa_model->masuk($post);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $params = array(
                    'id_siswa' => $row->id_siswa,
                    'nama' => $row->nama
                );
                $this->session->set_userdata($params);
                $pesan="Anda Berhasil login";
            $url = base_url('home1');
            echo "<script>
                alert('$pesan');
                location='$url';
            </script>";
        }else{
            $pesan="Username dan Password Anda Salah";
            $url = base_url('auth/login1');
            echo "<script>
                alert('$pesan');
                location='$url';
            </script>";
            }
        }
    }


    public function logout()
    {
        $params = array('id_petugas');
        $this->session->unset_userdata($params);
        redirect('auth/login2');
    }

    public function lupapass()
    
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run() == false){
            $data['judul'] = "forgot";
            $this->load->view('lupapass');
        }else{
            $email = $this->input->post('email');
            $siswa = $this->db->get_where('siswa', ['email' => $email])->row_array();

            if($siswa){

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' =>$email,
                    'token' =>$token,
                    'date_created' => time()
                ];


                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token);
                
                $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tolong Cek Email Kamu</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/lupapass');
                

            }else{
                $this->session->set_flashData('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Email Kamu Tidak Terdaftar</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/lupapass');
        
            }
        }
		
       
	}

    public function lupapassadmin()
    
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run() == false){
            $data['judul'] = "forgot";
            $this->load->view('lupapassadmin');
        }else{
            $email = $this->input->post('email');
            $admin = $this->db->get_where('petugas', ['email' => $email])->row_array();

            if($admin){

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' =>$email,
                    'token' =>$token,
                    'date_created' => time()
                ];


                $this->db->insert('user_token', $user_token);
                $this->sendEmail($token);
                
                $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tolong Cek Email Kamu</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/lupapassadmin');
                

            }else{
                $this->session->set_flashData('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Email Kamu Tidak Terdaftar</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/lupapassadmin');
        
            }
        }
		
       
	}
    public function _sendEmail($token)
    {
        
    	$config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'jayjayailham@gmail.com',
            'smtp_pass' => 'vjrthspqkkvxytgu',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        

        $this->email->initialize($config);
        
        $this->email->from('diwin321@gmail.com', 'Sekolah sma');
        $this->email->to($this->input->post('email', $config));
        

        
            $this->email->subject('Reset Password');
            $this->email->message('click this link to reset password : <a 
            href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post
            ('email') . '&token=' . urlencode($token) . '">Reset Password </a>');
        
        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
            
        }
    }

    public function sendEmail($token)
    {
        
    	$config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'diwin321@gmail.com',
            'smtp_pass' => 'rjaambeqecjodxxm',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        

        $this->email->initialize($config);
        
        $this->email->from('diwin321@gmail.com', 'Sekolah sma');
        $this->email->to($this->input->post('email', $config));
        

        
            $this->email->subject('Reset Password');
            $this->email->message('click this link to reset password : <a 
            href="' . base_url() . 'auth/resetpasswordadmin?email=' . $this->input->post
            ('email') . '&token=' . urlencode($token) . '">Reset Password </a>');
        
        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
            
        }
    }
    public function resetpassword(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('siswa', ['email' => $email])->row_array();
        
        if($user){

            $user_token = $this->db->get_where('user_token', ['token' => $token])
        ->row_array();
        if($user_token){

            $this->session->set_userdata('reset_email', $email);
            $this->changepassword();
        }else{
            $this->session->set_flashData('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Reset Password Failed !! Salah Email</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/lupapass');
        }



        }else{
            $this->session->set_flashData('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Reset Password Failed !! Salah</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/lupapass');
        }
    }

    public function resetpasswordadmin(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('petugas', ['email' => $email])->row_array();
        
        if($user){

            $user_token = $this->db->get_where('user_token', ['token' => $token])
        ->row_array();
        if($user_token){

            $this->session->set_userdata('reset_emailadmin', $email);
            $this->changepasswordadmin();
        }else{
            $this->session->set_flashData('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Reset Password Failed !! Salah Email</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/lupapassadmin');
        }



        }else{
            $this->session->set_flashData('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Reset Password Failed !! Salah</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/lupapassadmin');
        }
    }
    public function changepassword(){

        if(!$this->session->userdata('reset_email')){
            redirect('auth/login1');
        }

        $this->form_validation->set_rules(
            'pass1',
            'Password',
            'min_length[5]|matches[pass2]',
            [
                'min_length' => "Password minimal 5 digit",
                'matches' => "Password tidak sesuai"
            ]
        );
        $this->form_validation->set_rules(
            'pass2',
            'Konfirmasi Password',
            'matches[pass1]',
            ['matches' => "Konfirmasi Password tidak sesuai"]
        );
        if($this->form_validation->run() == false){
            $data['judul'] = "Ganti Password";
            $this->load->view('changepassword');
        }else{
            $password = sha1($this->input->post('pass1'));
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('siswa');

            $this->session->unset_userdata('reset_email');
            
            $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Password Telah Diubah, Tolong Login</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/login1');
        }
        
    }

    public function changepasswordadmin(){

        if(!$this->session->userdata('reset_emailadmin')){
            redirect('auth/login');
        }

        $this->form_validation->set_rules(
            'pass1',
            'Password',
            'min_length[5]|matches[pass2]',
            [
                'min_length' => "Password minimal 5 digit",
                'matches' => "Password tidak sesuai"
            ]
        );
        $this->form_validation->set_rules(
            'pass2',
            'Konfirmasi Password',
            'matches[pass1]',
            ['matches' => "Konfirmasi Password tidak sesuai"]
        );
        if($this->form_validation->run() == false){
            $data['judul'] = "Ganti Password";
            $this->load->view('changepasswordadmin');
        }else{
            $password = sha1($this->input->post('pass1'));
            $email = $this->session->userdata('reset_emailadmin');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('petugas');

            $this->session->unset_userdata('reset_emailadmin');
            
            $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Password Telah Diubah, Tolong Login</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/login');
        }
        
    }
}