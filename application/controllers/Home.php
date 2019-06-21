<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model("Internship");
	}


    
    public function index(){        
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Informasi'; 
        $query="select count(id) as jumlah from internship";
        $result ['totalMagang'] = $this->db->query($query)->row();
        $query="select count(id) as jumlah from internship where gender='P'";
        $result ['totalPerempuan'] = $this->db->query($query)->row();
        $query="select count(id) as jumlah from internship where gender='L'";
        $result ['totalLaki'] = $this->db->query($query)->row(); 
        $query = "select name,image from user where roleId=".$role['role'];
        $top ['user'] = $this->db->query($query)->row();         
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('home_page',$result);
        $this->load->view('template/footer');
    }

    public function daftarMagang(){
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Daftar Magang';
        $query = "select name,image from user where roleId=".$role['role'];
        $top ['user'] = $this->db->query($query)->row();         
        for ($i=0; $i <=12 ; $i++) {             
            $result['daftarMagang'][$i] = $this->Internship->getRekapByMonth($i);
        }
        // for ($i=0; $i <=12 ; $i++) {             
        //     $result['jumlahdaftarMagang'][$i] = $this->Internship->getCountByMonth($i);
        // }
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('daftar_magang',$result);
        $this->load->view('template/footer');
    }
   
    public function permintaan(){
        $role['role']=$this->session->userdata('roleId');
        $query = "SELECT fullname,department,institute ,concat (date_format(date_start,'%d-%M-%Y'),concat(' sd ',concat(date_format(date_end,'%d-%M-%Y')))) as 'waktupkl' FROM internship";
        $result['daftarPermintaan']=$this->db->query($query)->result();
        $query = "select name,image from user where roleId=".$role['role'];
        $top ['user'] = $this->db->query($query)->row(); 
        $data['title'] = 'Permintaan Magang';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('Permintaan_magang',$result);
        $this->load->view('template/footer');
    }

    public function daftarAdministrator(){
        $role['role']=$this->session->userdata('roleId');
        $query = "select name,image from user where roleId=".$role['role'];
        $top ['user'] = $this->db->query($query)->row(); 
        $data['title'] = 'Daftar Administrator';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('daftar_administrator');
        $this->load->view('template/footer');
    }

    public function gantiPassword(){
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Profil Saya';
        $query = "select name,image from user where roleId=".$role['role'];
        $top ['user'] = $this->db->query($query)->row();
        $query = "select * from user where roleId=".$role['role'];
        $result ['user'] = $this->db->query($query)->row();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('profil',$result);
        $this->load->view('template/footer');
    }
    
    public function logout(){
        $this->session->unset_userdata('roleId');
        $this->session->unset_userdata('username');
        redirect('Auth');
    }
    

}