<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_not_login();
    }

    public function index(){

        $data['judul']="Home";
        
        $this->load->view('templates/header',$data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

}
