<!-- 
    Nama                : Eko Ramadhanu Aryputra
    Tanggal Pembuatan   : 18 Juni 2019  
    Keguanan kelas ini  : kelas ini digunakan sebagai controler yaitu sebagai penghubung antara view home dengan
                          beberapa model user dan internship
    Perbaikan Terakhir  
    Nama                : Eko Ramadhanu Aryputra
    Tanggal Perbaikan   : memperbaiki masalah controler yang benar benar di gunakan oleh home
 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    private $tahun;

    /*
      kontrsuktor yang digunakan untuk memanggil model internship
      dan user
     */
    public function __construct()
	{
		parent::__construct();
		$this->load->model("Internship");
        $this->load->model("User");
        $this->load->library('form_validation');
        $this->load->helper(array('url'));		
        if(!$this->session->userdata('roleId')){
            redirect('Auth');
        }
	}


    /*
     method index ini digunakan untuk menghubungkan antara view home_page dengan model
     user dan internship 
     */
    public function index(){  
        // data yang dikirmkan ke view header
        $data['title'] = 'Informasi'; 
        // data yang dikirimkan ke view topbar
        $role['id']=$this->session->userdata('id');        
        $role['role']=$this->session->userdata('roleId');        
        $role['title'] = $data['title'];
        
        $tahun= $this->input->get('tahun');
        if($tahun == 0){
            $tahun=date('Y');            
        }else{
            $tahun=$tahun;            
        }        
        $result ['totalMagang'] = $this->Internship->getCountAllByYear($tahun);        
        $result ['totalPerempuan'] = $this->Internship->getCountByGenderAndYear('P',$tahun);                
        $result ['totalLaki'] = $this->Internship->getCountByGenderAndYear('L',$tahun);        
        $result['tahun']= $tahun;
        $top['user']= $this->User->getIdentityUser($role['id']);
        // buat menampilkan jumlah dalam bentuk pie chart
        $diagram['menunggu'] = $this->Internship->getCountByStatusAndYear('menunggu',$tahun);
        $diagram['ditolak'] = $this->Internship->getCountByStatusAndYear('ditolak',$tahun);
        $diagram['terdaftar'] = $this->Internship->getCountByStatusAndYear('terdaftar',$tahun);        
        // buat menampilkan jumlah dalam bentuk area chart
        for ($i=1; $i <=12 ; $i++) { 
			$temp['jumlahStartDate'][$i]= $this->Internship->getCountByStartDatePKL($i,$tahun);
            for ($j=1; $j <$i ; $j++) { 								
                $temp['jumlahEndaDate'][$i][$j]= $this->Internship->getCountByEndDatePKL($j,$tahun,$i,$tahun);
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
        $this->load->view('template/footer',$diagram);
    }
    
    
}








