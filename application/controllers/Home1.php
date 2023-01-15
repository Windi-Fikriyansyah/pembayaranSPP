<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home1 extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_not_login1();
    }

    public function index(){

        $data['judul']="Home";
        
        $this->load->view('templates/header1',$data);
        $this->load->view('home1/index', $data);
        $this->load->view('templates/footer');
    }

    public function get_sum(){
        $data['total'] = $this->Pembayaran_spp_model->get_sum();
        $this->load->view('templates/header1',$data);
        $this->load->view('home1/index', $data);
        $this->load->view('templates/footer');
    }

}
