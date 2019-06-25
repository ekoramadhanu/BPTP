<!-- 
    Nama                : Eko Ramadhanu Aryputra
    Tanggal Pembuatan   : 18 Juni 2019
    Keguanan kelas ini  : kelas ini digunakan sebagai controler yaitu sebagai penghubung antara view home dengan
                          beberapa model user dan internship

 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model("Internship");
		$this->load->model("User");
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
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('daftar_magang',$result);
        $this->load->view('template/footer');
    }
   
    // public function permintaan(){
    //     $role['role']=$this->session->userdata('roleId');
    //     $query = "SELECT fullname,department,institute ,concat (date_format(date_start,'%d-%M-%Y'),concat(' sd ',concat(date_format(date_end,'%d-%M-%Y')))) as 'waktupkl' FROM internship";
    //     $result['daftarPermintaan']=$this->db->query($query)->result();
    //     $query = "select name,image from user where roleId=".$role['role'];
    //     $top ['user'] = $this->db->query($query)->row(); 
    //     $data['title'] = 'Permintaan Magang';
    //     $this->load->view('template/header',$data);
    //     $this->load->view('template/sidebar',$role);
    //     $this->load->view('template/topbar',$top);
    //     $this->load->view('Permintaan_magang',$result);
    //     $this->load->view('template/footer');
    // }

    public function daftarAdministrator(){
        $role['role']=$this->session->userdata('roleId');
        $query = "select name,image from user where roleId=".$role['role'];
        $top ['user'] = $this->db->query($query)->row(); 
        $data['title'] = 'Daftar Administrator';
        $result['user'] =$this->User->getDaftarAdministrasi();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('daftar_administrator',$result);
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

    public function tambahData(){
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Profil Saya';
        $query = "select name,image from user where roleId=".$role['role'];
        $top ['user'] = $this->db->query($query)->row();        
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('tambah_data');
        $this->load->view('template/footer');
    }

    public function insertData(){
        $nama = $this->input->post('nama');
        $universitas = $this->input->post('universitas');
        $programStudi =$this->input->post('programStudi');
        $penempatanMagang =$this->input->post('penempatanMagang');
        $pembimbingMagang =$this->input->post('pembimbingMagang');
        $tanggalMulai =$this->input->post('tanggalMulai');
        $tanggalBerakhir =$this->input->post('tanggalSelesai');
        echo $nama;
        echo $universitas;
        echo $programStudi;
        echo $penempatanMagang;
        echo $pembimbingMagang;
        echo $tanggalMulai;
        echo $tanggalBerakhir;

    }

    public function logout(){
        $this->session->unset_userdata('roleId');
        $this->session->unset_userdata('username');
        redirect('Auth');
    }
    

}