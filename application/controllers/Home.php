<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function index(){        
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Informasi'; 
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar');
        $this->load->view('home_page');
        $this->load->view('template/footer');
    }

    public function daftarMagang(){
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Daftar Magang';        
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar');
        $this->load->view('daftar_magang');
        $this->load->view('template/footer');
    }
   
    public function permintaan(){
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Permintaan Magang';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar');
        $this->load->view('Permintaan_magang');
        $this->load->view('template/footer');
    }

    public function daftarAdministrator(){
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Daftar Administrator';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar');
        $this->load->view('daftar_administrator');
        $this->load->view('template/footer');
    }

    public function profilSaya(){
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Profil Saya';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar');
        $this->load->view('profil');
        $this->load->view('template/footer');
    }
    
    public function logout(){
        $this->session->unset_userdata('roleId');
        $this->session->unset_userdata('username');
        redirect('Auth');
    }
    

}