<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function index(){
        $title= 'Login';
        $this->load->view('template/auth_header');
        $this->load->view('login',$title);
        $this->load->view('template/auth_footer');
    }
}