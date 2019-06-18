<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function index(){        
        $role=$this->session->userdata('roleId');
        if($role == 1){
            $data['title']= 'Super Administrator';            
        }else{
            $data['title']= 'Administrator';    
        }
        $query =("SELECT role_akses.nama from role join role_akses on role.id = role_id where role_id =".$role);
        $result['role']= $this->db->query($query)->row_array();                
        $result['role1'] =$role; 
        $this->load->view('template/admin_header',$data);
        $this->load->view('home_page',$result);
        $this->load->view('template/admin_footer');
    }

    public function daftar(){
        $role=$this->session->userdata('roleId');
        if($role == 1){
            $data['title']= 'Super Administrator';            
        }else{
            $data['title']= 'Administrator';    
        }
        $this->load->view('template/admin_header');
        $this->load->view('daftar_magang',$title);
        $this->load->view('template/admin_footer');
    }
   
    public function permintaan(){
        $role=$this->session->userdata('roleId');
        if($role == 1){
            $data['title']= 'Super Administrator';            
        }else{
            $data['title']= 'Administrator';    
        }
        $this->load->view('template/admin_header');
        $this->load->view('Permintaan_magang',$title);
        $this->load->view('template/admin_footer');
    }

    public function logout(){
        $this->session->unset_userdata('roleId');
        $this->session->unset_userdata('username');
        redirect('Auth');
    }

    // private function role(){
    //     $role=$this->session->userdata('roleId');
    //     if($role == 1){
    //         return 'Super Administrator';
    //     }else{
    //         return 'Administrator';
    //     }
    // }

}