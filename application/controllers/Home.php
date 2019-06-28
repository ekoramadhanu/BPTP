<!-- 
    Nama                : Eko Ramadhanu Aryputra
    Tanggal Pembuatan   : 18 Juni 2019
    Keguanan kelas ini  : kelas ini digunakan sebagai controler yaitu sebagai penghubung antara view home dengan
                          beberapa model user dan internship

 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


    /*
      kontrsuktor yang digunakan untuk memanggil model internship
      dan user
     */
    public function __construct()
	{
		parent::__construct();
		$this->load->model("Internship");
        $this->load->model("User");
        if(!$this->session->userdata('roleId')){
            redirect('Auth');
        }
	}


    /*
     method index ini digunakan untuk menghubungkan antara view home_page dengan model
     user dan internship 
     */
    public function index(){        
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Informasi'; 
        $role['title'] = $data['title'];
        $query="select count(id) as jumlah from internship";
        $result ['totalMagang'] = $this->db->query($query)->row();
        $query="select count(id) as jumlah from internship where gender='P'";
        $result ['totalPerempuan'] = $this->db->query($query)->row();
        $query="select count(id) as jumlah from internship where gender='L'";
        $result ['totalLaki'] = $this->db->query($query)->row(); 
        $query = "select name,image from user where roleId=".$role['role'];
        $top ['user'] = $this->db->query($query)->row();  
        // buat menampilkan jumlah dalam bentuk pie chart
        $diagram['menunggu'] = $this->Internship->getCountByStatus('menunggu');
        $diagram['tersetujui'] = $this->Internship->getCountByStatus('tersetujui');
        $diagram['terdaftar'] = $this->Internship->getCountByStatus('terdaftar');        
        // buat menampilkan jumlah dalam bentuk area chart
        for ($i=1; $i <=12 ; $i++) { 
			$temp['jumlahStartDate'][$i]= $this->Internship->getCountByStartDatePKL($i,2019);
            for ($j=1; $j <$i ; $j++) { 								
                $temp['jumlahEndaDate'][$i][$j]= $this->Internship->getCountByEndDatePKL($j,2019,$i,2019);
            }
            $jumlah = 0;
            for ($j=1; $j <$i ; $j++) { 
                $jumlah += $temp['jumlahEndaDate'][$i][$j];
            }
            $diagram['total'][$i]=$temp['jumlahStartDate'][$i]+$jumlah;            
        }
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('home_page',$result);
        // $this->load->view('template/pie_chart');
        $this->load->view('template/footer',$diagram);
    }

    /*
       method daftarMagang ini digunakan untuk  menghubungkan anatara view daftar_magang
       dengan model User dan Internship
     */
    public function daftarMagang(){
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Daftar Magang';
        $role['title'] = $data['title'];
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

    /*
       method daftarMagang ini digunakan untuk  menghubungkan anatara view daftar_magang
       dengan model User dan Internship
     */
    public function daftarAdministrator(){
        $role['role']=$this->session->userdata('roleId');
        if ($role['role'] == 1){
            $data['title'] = 'Daftar Administrator';
            $role['title'] = $data['title'];
            $query = "select name,image from user where roleId=".$role['role'];
            $top ['user'] = $this->db->query($query)->row(); 
            $result['user'] =$this->User->getDaftarAdministrasi();
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$role);
            $this->load->view('template/topbar',$top);
            $this->load->view('daftar_administrator',$result);
            $this->load->view('template/footer',$data);
        }else{
            $data['title'] = 'Error';            
            $this->load->view('page_403',$data);
        }
    }

    /*
     method gantiPasswor ini digunakan untuk menghubungkan antara view  profil dengan 
     model user
     */
    public function gantiPassword(){
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Ganti Password';
        $role['title'] = $data['title'];
        $query = "select name,image from user where roleId=".$role['role'];
        $top ['user'] = $this->db->query($query)->row();        
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('ganti_password');
        $this->load->view('template/footer');
    }

    /*
      method tambahData ini digunakan untuk menghubungkan anatara view tambah data dengan model
      User
     */
    public function tambahData(){
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Tambah Data';
        $role['title'] = $data['title'];
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

    /*
       method logout ini digunakan untuk menghapus session serta mengarahkan ke 
       controler Auth dengan method index
     */
    public function logout(){
        $this->session->unset_userdata('roleId');
        $this->session->unset_userdata('username');
        redirect('Auth');
    }
    

}