<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
    }

    public function index()
    {
        $this->load->view('login');
        if($this->input->post('submit'))
        {
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            if($email == 'retretpd2018@gmail.com' && $pass == 'sttsuntukjesus'){
                $this->session->set_userdata('email', 'retretpd2018@gmail.com');
                redirect('HistoryMaker');
            }else{
                echo "<script>alert('Login GAGAL !!')</script>";
            }
        }
    }


}
