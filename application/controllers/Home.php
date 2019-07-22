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
        $nextYear =$tahun +1;
        $prevYear =$tahun -1;
        $result ['totalMagang'] = $this->Internship->getCountAllByYear($tahun);
        $result['totalMagang'] += $this->Internship->getCountAllByEndYear($tahun);                
        $result ['totalPerempuan'] = $this->Internship->getCountByGenderAndStartYear('P',$tahun);                
        $result ['totalPerempuan'] += $this->Internship->getCountByGenderAndEndYear('P',$tahun);                
        $result ['totalLaki'] = $this->Internship->getCountByGenderAndStartYear('L',$tahun);        
        $result ['totalLaki'] += $this->Internship->getCountByGenderAndEndYear('L',$tahun);        
        $result['tahun']= $tahun;
        $top['user']= $this->User->getIdentityUser($role['id']);
        // buat menampilkan jumlah dalam bentuk pie chart
        $diagram['menunggu'] = $this->Internship->getCountByStatusAndStartYear('menunggu',$tahun);
        $diagram['menunggu'] += $this->Internship->getCountByStatusAndEndYear('menunggu',$tahun);
        $diagram['ditolak'] = $this->Internship->getCountByStatusAndStartYear('ditolak',$tahun);
        $diagram['ditolak'] += $this->Internship->getCountByStatusAndEndYear('ditolak',$tahun);
        $diagram['terdaftar'] = $this->Internship->getCountByStatusAndStartYear('terdaftar',$tahun);        
        $diagram['terdaftar'] += $this->Internship->getCountByStatusAndEndYear('terdaftar',$tahun);        
        // fix area chart
        for ($i=1; $i <=12 ; $i++) { 
            $result['jumlahStartDate'][$i]= $this->Internship->getCountByStartDatePKL($i,$tahun);
            $result['JumlahendMonthNextInNow'][$i]= $this->Internship->getCountByEndDatePKL($i,$tahun,$nextYear);
            $result['JumlahendMonthPrevInNow'][$i]= $this->Internship->getCountByEndDatePKL($i,$tahun,$prevYear);
            for ($j=1; $j <$i ; $j++) { 								
				$result['jumlahEndaDate'][$i][$j]= $this->Internship->getCountByEndDatePKL($i,$tahun,null,$j);
            }
            $jumlah = 0 ;
            $jumlah += $result['jumlahStartDate'][$i] ;
            $jumlah += $result['JumlahendMonthNextInNow'][$i] ;
            $jumlah += $result['JumlahendMonthPrevInNow'][$i] ;
            for ($j=1; $j <$i ; $j++) { 
               $jumlah += $result['jumlahEndaDate'][$i][$j];
            }
            $diagram['total'][$i]=$jumlah;            

        }        
        // fix batang chart
        for ($i=1; $i <=12 ; $i++) { 
            $result['jumlahStartDateSiswa'][$i]= $this->Internship->getRekapStartDateByIsSekolah(1,$i,$tahun);
            $result['jumlahStartDateMahasiswa'][$i]= $this->Internship->getRekapStartDateByIsSekolah(0,$i,$tahun);
            $result['JumlahendMonthNextInNowSiswa'][$i]= $this->Internship->getRekapEndtDateByIsSekolah(1,$i,$tahun,$nextYear);
            $result['JumlahendMonthNextInNowMahasiswa'][$i]= $this->Internship->getRekapEndtDateByIsSekolah(0,$i,$tahun,$nextYear);
            $result['JumlahendMonthPrevInNowSiswa'][$i]= $this->Internship->getRekapEndtDateByIsSekolah(1,$i,$tahun,$prevYear);
            $result['JumlahendMonthPrevInNowMahasiswa'][$i]= $this->Internship->getRekapEndtDateByIsSekolah(0,$i,$tahun,$prevYear);
            for ($j=1; $j <$i ; $j++) { 								
				$result['jumlahEndaDateSiswa'][$i][$j]= $this->Internship->getRekapEndtDateByIsSekolah(1,$i,$tahun,null,$j);
				$result['jumlahEndaDateMahasiswa'][$i][$j]= $this->Internship->getRekapEndtDateByIsSekolah(0,$i,$tahun,null,$j);
            }
            $jumlahSiswa = 0 ;
            $jumlahMahasiswa = 0 ;
            $jumlahSiswa += $result['jumlahStartDateSiswa'][$i] ;
            $jumlahSiswa += $result['JumlahendMonthNextInNowSiswa'][$i] ;
            $jumlahSiswa += $result['JumlahendMonthPrevInNowSiswa'][$i] ;
            $jumlahMahasiswa += $result['jumlahStartDateMahasiswa'][$i] ;
            $jumlahMahasiswa += $result['JumlahendMonthNextInNowMahasiswa'][$i] ;
            $jumlahMahasiswa += $result['JumlahendMonthPrevInNowMahasiswa'][$i] ;
            for ($j=1; $j <$i ; $j++) { 
                $jumlahSiswa += $result['jumlahEndaDateSiswa'][$i][$j];
                $jumlahMahasiswa += $result['jumlahEndaDateMahasiswa'][$i][$j];
            }
            $diagram['totalMahasiswa'][$i]=$jumlahMahasiswa;            
            $diagram['totalSiswa'][$i]=$jumlahSiswa;            
        }          
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('home_page',$result);        
        $this->load->view('template/footer',$diagram);
    }
    
    
}








