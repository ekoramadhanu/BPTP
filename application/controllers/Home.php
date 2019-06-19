<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function index(){        
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Informasi'; 
        $query="select count(id) from internship";
        $result ['totalMagang'] = $this->db->query($query);
        $query="select count(id) from internship where gender='P'";
        $result ['totalPerempuan'] = $this->db->query($query);
        $query="select count(id) from internship where gender='L'";
        $result ['totalLaki-Laki'] = $this->db->query($query);
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar');
        $this->load->view('home_page');
        $this->load->view('template/footer');
    }

    public function daftarMagang(){
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Daftar Magang';        
        $query= "select count(fullname) as jumlah,department,institute,
        concat (date_format(date_start,'%d-%M-%Y'),concat(' sd ',concat(date_format(date_end,'%d-%M-%Y')))) as 'waktupkl',place,guide,create_at from internship group by place,guide,create_at";
        $result['daftarMagang'] = $this->db->query($query)->result();
        // var_dump($result['daftarMagang']);
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar');
        $this->load->view('daftar_magang',$result);
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