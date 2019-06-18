<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index(){
        $title= 'Administrator';
        $this->load->view('template/admin_header');
        $this->load->view('dasboard',$title);
        $this->load->view('template/admin_footer');
    }

    public function daftar(){
        $title= 'Administrator';
        $this->load->view('template/admin_header');
        $this->load->view('daftar_magang',$title);
        $this->load->view('template/admin_footer');
    }
   
    public function permintaan(){
        $title= 'Administrator';
        $this->load->view('template/admin_header');
        $this->load->view('Permintaan_magang',$title);
        $this->load->view('template/admin_footer');
    }

}