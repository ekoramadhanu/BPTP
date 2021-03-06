<!-- 
	Nama                : Eko Ramadhanu Aryputra
    Tanggal Pembuatan   : 8 Juli 2019  
    Keguanan kelas ini  : kelas ini digunakan sebagai controler yaitu sebagai penghubung antara view daftar magang dan tambah data dengan
                          beberapa model user dan internship
	Perbaikan Terakhir  
    Nama                : Eko Ramadhanu Aryputra
    Tanggal Perbaikan   : memindahkan beberapa function dari controler home yang sesuai dengan kelas controler magang
 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magang extends CI_Controller {

	/**
	 * constructor ini digunakan untuk menghubungkan antara model Internship, User,
	 * form validation, helper url, dan juga memvalidasi apakah session tersedia jika tidak maka akan dilempar 
	 * ke controler Auth.php
	 * 
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
	/**
	 * function index ini digunakan untuk melemparkan ke function daftar magang
	 */
	public function index(){
		redirect('Magang/daftarMagang');
	}

	/** 
	 * method daftarMagang ini digunakan untuk  menghubungkan anatara view daftar_magang
	 * dengan model User dan Internship yang akan ditampikan dengan pagination 
	 */     
	public function daftarMagang()
	{
        if($this->session->userdata('tahun') || $this->session->userdata('nama')){
            $this->session->unset_userdata('tahun');
            $this->session->unset_userdata('nama');
        }
		$role['id']=$this->session->userdata('id');  
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Daftar Magang';
        $role['title'] = $data['title'];
        $top['user']= $this->User->getIdentityUser($role['id']);
        
        $this->load->library('pagination');

        // pencarian data         
        if($this->input->post('submit')){
            $tahun= $this->input->post('tahun');
            $nama= $this->input->post('nama');
            if($tahun && $nama){
                $tahun = $tahun;
                $nama = $nama;
            }else if ($nama){
                $tahun = null;
                $nama = $nama;            
            }else{
                $tahun = $tahun;
                $nama = null;            
            }         
            $this->session->set_userdata('tahun',$tahun);
            $this->session->set_userdata('nama',$nama);
        }else{
            $tahun = $this->session->userdata('tahun');
            $nama = $this->session->userdata('nama');
            $nama = null;
        }

        // config pagination                
        $config['total_rows'] = $this->Internship->getCountAll($tahun,$nama);
        $config['per_page'] = 5;        
        
        // inisialisasi pagination
        $this->pagination->initialize($config);
        if(!$this->uri->segment(3)){
            $result['start'] = 0;
        }else if($this->uri->segment(3)){
            $result['start'] = $this->uri->segment(3);
        }                                
        $result['daftarMagang']= $this->Internship->getLimitAndOffset($config['per_page'],$result['start'],$tahun,$nama);         

        // akhir dari pebuatan pagination
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$role);
        $this->load->view('template/topbar',$top);
        $this->load->view('daftar_magang',$result);
        $this->load->view('template/footer');
	}
	
	/**
	 * function ini digunakan untuk mencetak rekap tahunan dari daftar maganag yang 
	 * akan langsung membuat file yang siap diprint berdasarkan tahun masukkan 
	 */
	public function cetakRekap(){		
        $result['tahunRekap'] = $this->input->get('tahun');			
        $nextYear=$result['tahunRekap']+1;
        $prevYear=$result['tahunRekap']-1;        
        for ($i=1; $i <= 12 ; $i++) { 
            $result['startMonth'][$i]= $this->Internship->getRekapByStartDatePKL($i,$result['tahunRekap']);
            $result['endMonthNextInNow'][$i]= $this->Internship->getRekapByEndDatePKL($i,$result['tahunRekap'],$nextYear);
            $result['endMonthPrevInNow'][$i]= $this->Internship->getRekapByEndDatePKL($i,$result['tahunRekap'],$prevYear);				            
			for ($j=1; $j < $i ; $j++) { 								                
				$result['endMonth'][$i][$j]= $this->Internship->getRekapByEndDatePKL($i,$result['tahunRekap'],null,$j);
			}
        }        
		for ($i=1; $i <=12 ; $i++) { 
            $result['jumlahStartDate'][$i]= $this->Internship->getCountByStartDatePKL($i,$result['tahunRekap']);
            $result['JumlahendMonthNextInNow'][$i]= $this->Internship->getCountByEndDatePKL($i,$result['tahunRekap'],$nextYear);
            $result['JumlahendMonthPrevInNow'][$i]= $this->Internship->getCountByEndDatePKL($i,$result['tahunRekap'],$prevYear);
            for ($j=1; $j <$i ; $j++) { 								
				$result['jumlahEndaDate'][$i][$j]= $this->Internship->getCountByEndDatePKL($i,$result['tahunRekap'],null,$j);
			}
		}
        $result['total'] = $this->Internship->getCountAllByYear($result['tahunRekap']);						        
        $result['total'] += $this->Internship->getCountAllByEndYear($result['tahunRekap']);
        $this->load->view('testRekap',$result);
		// $this->load->view('print_rekap',$result);
		

	}

	/**
	 * method ini digunakan untuk mencetak rekap tahunan dari daftar maganag yang 
	 * akan langsung membuat file yang siap diprint berdasarkan tahun masukkan 
	 */
	public function cetakBalasan($kelompok = null){
		$detail['nomorSurat'] = $this->input->get('nomorSurat');
		$detail['nomorLampiran'] = $this->input->get('nomorLampiran');
		$detail['penerima'] = $this->input->get('penerima');
		$detail['nomorBalasan'] = $this->input->get('nomorBalasan');
		$detail['tempatTujuan'] = $this->input->get('tempatTujuan');
		$detail['perihal'] = $this->input->get('perihal');		
		$detail['tanggalBalasan'] = $this->input->get('hariSurat');
		$detail['bulanBalasan'] = $this->input->get('bulanSurat');
		$detail['tahunBalasan'] = $this->input->get('tahunSurat');
		$detail['tanggal'] = date('d');
		$detail['bulan'] = date('m');
		$detail['tahun'] = date('Y');		
		$detail['fullname'] = $this->Internship->getNameByKelompok($kelompok);
		$detail['department'] = $this->Internship->getDepartmentByKelompok($kelompok);
        $detail['institution'] = $this->Internship->getInstitutionByKelompok($kelompok);
        $detail['studyProgram']=$this->Internship->getProgramStudyByKelompok($kelompok);
        $detail['faculty']=$this->Internship->getFakultasByKelompok($kelompok);
        $detail['detail'] = $this->Internship->getRekapBalasanByKelompok($kelompok);	
        $indexSurat= $this->input->get('indexSurat');        
        $data = array();
        $id = $this->Internship->getNIMByKelompok($kelompok);
        foreach ((array)$id as $result) {
            switch($detail['bulanBalasan']){
                case 'Januari':
                $bulan=1;
                break;
            case 'Februari':
                $bulan=2;
                break;
            case 'Maret':
                $bulan=3;
                break;
            case 'April':
                $bulan=4;
                break;
            case 'Mei':
                $bulan=5;
                break;
            case 'Juni':
                $bulan=6;
                break;
            case 'Juli':
                $bulan=7;
                break;
            case 'Agustus':
                $bulan=8;
                break;
            case 'September':
                $bulan=9;
                break;
            case 'Oktober':
                $bulan=10;
                break;
            case 'November':
                $bulan=11;
                break;
            case 'Desember':
                $bulan=12;
                break;
            }
            array_push($data,array(
                'id'=>$result->id,
                'indexSurat'=>$indexSurat,
                'nomorSurat'=>$detail['nomorSurat'],
                'jumlahLampiran'=> $detail['nomorLampiran'],
                'perihal'=> $detail['perihal'],
                'namaPenerima'=>$detail['penerima'],
                'tempatSurat'=>$detail['tempatTujuan'],
                'nomorSuratBalasan'=> $detail['nomorBalasan'],
                'tanggalSuratBalasan'=> $detail['tahunBalasan']."-".$bulan."-".$detail['tanggalBalasan'],
                'isCetak' => 1                
            ));
        }        
        $result= $this->Internship->updateSuratBalasanByIdKelompok($data);        
		$this->load->view('print_balasan',$detail);
	}

	public function tambahData(){
        $role['id']=$this->session->userdata('id');       
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Tambah Data';
        $role['title'] = $data['title'];
        $top['user']= $this->User->getIdentityUser($role['id']);     
        // validasi form
        $this->form_validation->set_rules('nomor[]','nomor[]','is_unique[internship.id]',[
            "is_unique"=>'NIM / NISN sudah terdaftar'
        ]);
        if(!$this->form_validation->run()){            
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$role);
            $this->load->view('template/topbar',$top);
            $this->load->view('tambah_data');
            $this->load->view('template/footer');        
        }else{            
            $this->insertData();
        }
    }

	private function insertData(){        
        $nama = $this->input->post('nama');
        $nomor = $this->input->post('nomor');
        $jenisKelamin = $this->input->post('jenisKelamin');        
        $pekerjaan = $this->input->post('pekerjaan');        
        $sekolah = $this->input->post('sekolah');
        $fakultas =$this->input->post('fakultas');
        $jurusan = $this->input->post('jurusan');        
        $programStudi = $this->input->post('programstudi');        
        if($pekerjaan=='siswa'){
            $pekerjaan=1;
            $fakultas='-';
            $programStudi='-';
        }else{
            $pekerjaan=0;
        }
        $penempatanMagang =$this->input->post('penempatanMagang');
        $pembimbingMagang =$this->input->post('pembimbingMagang');
        $dayStart = $this->input->post('dayStart') ;
        $monthStart= $this->input->post('monthStart');
        $yearStart = $this->input->post('yearStart');
        $dayEnd = $this->input->post('dayEnd');
        $monthEnd = $this->input->post('monthEnd');
        $yearEnd = $this->input->post('yearEnd');        
        switch($monthStart){
            case 'Januari':
                $monthStart=1;
                break;
            case 'Februari':
                $monthStart=2;
                break;
            case 'Maret':
                $monthStart=3;
                break;
            case 'April':
                $monthStart=4;
                break;
            case 'Mei':
                $monthStart=5;
                break;
            case 'Juni':
                $monthStart=6;
                break;
            case 'Juli':
                $monthStart=7;
                break;
            case 'Agustus':
                $monthStart=8;
                break;
            case 'September':
                $monthStart=9;
                break;
            case 'Oktober':
                $monthStart=10;
                break;
            case 'November':
                $monthStart=11;
                break;
            case 'Desember':
                $monthStart=12;
                break;
        }
        switch($monthEnd){
            case 'Januari':
                $monthEnd=1;
                break;
            case 'Februari':
                $monthEnd=2;
                break;
            case 'Maret':
                $monthEnd=3;
                break;
            case 'April':
                $monthEnd=4;
                break;
            case 'Mei':
                $monthEnd=5;
                break;
            case 'Juni':
                $monthEnd=6;
                break;
            case 'Juli':
                $monthEnd=7;
                break;
            case 'Agustus':
                $monthEnd=8;
                break;
            case 'September':
                $monthEnd=9;
                break;
            case 'Oktober':
                $monthEnd=10;
                break;
            case 'November':
                $monthEnd=11;
                break;
            case 'Desember':
                $monthEnd=12;
                break;
        }
        $check;
        for ($i=0; $i < count($nomor)-1; $i++) { 
            for ($j=$i+1; $j<count($nomor); $j++) { 
                if($nomor[$i] ==$nomor[$j]){
                    $check=true;
                }
            }
        }
        if($check){
            $this->session->set_flashdata('message','<div class="alert alert-danger text-capitalize" role="alert">NIM/NISN tidak boleh ada yang sama</div>');
            redirect('Magang/tambahData');
            return;
        }else if($yearStart > $yearEnd){
            $this->session->set_flashdata('message','<div class="alert alert-danger text-capitalize" role="alert">tahun mulai magang tidak boleh lebih besar</div>');
            redirect('Magang/tambahData');
            return;
        }else if($yearStart = $yearEnd){
            if($monthStart > $monthEnd){
                $this->session->set_flashdata('message','<div class="alert alert-danger text-capitalize" role="alert">bulan mulai magang tidak boleh lebih besar</div>');
                redirect('Magang/tambahData');
                return;
            }else if($dayStart > $dayEnd && $monthStart == $monthEnd){
				$this->session->set_flashdata('message','<div class="alert alert-danger text-capitalize" role="alert">hari mulai magang tidak boleh lebih besar</div>');
                redirect('Magang/tambahData');
                return;
			}
        }        
        $data = array();
        $index = 0;           
        foreach ((array)$nomor as $result) {
            array_push($data,array(
                'id'=>$result,
                'fullname'=>$nama[$index],
                'studyProgram'=>$programStudi,
                'department'=>$jurusan,
                'faculty'=>$fakultas,
                'institute'=>$sekolah,
                'gender'=>$jenisKelamin[$index],
                'status'=>'terdaftar',
                'place'=>$penempatanMagang,
                'guide'=>$pembimbingMagang,
                'id_kelompok'=>$nomor[0],
                'is_sekolah'=>$pekerjaan,
                'dayStar'=>$dayStart,
                'monthStart'=>$monthStart,
                'yearStart'=>$yearStart,
                'dayEnd'=>$dayEnd,
                'monthEnd'=>$monthEnd,
                'yearEnd'=>$yearEnd,
                'isCetak'=>0
                )
            );
            $index++;
        }                
        $result = $this->Internship->insertNewInternship($data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
        // if($result){
        //     $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
        // }else{
        //     $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Tidak Berhasil Ditambahkan</div>');
        // }
        redirect('Magang/tambahData');
    }

    public function setuju($kelompok=null){
        $pembimbing = $this->input->post('pembimbingMagang');
        $tempat = $this->input->post('penempatanMagang');        
        $data= array();
        $fullname = $this->Internship->getNIMByKelompok($kelompok);
        // var_dump($fullname);
        foreach ($fullname as $result) {
            array_push($data,array(
                'id'=>$result->id,    
                'status'=>'terdaftar',            
                'place'=>$tempat,
                'guide'=>$pembimbing
                )
            );
        }
        // print_r(json_encode($data));
        
        $result = $this->Internship->updateByNIM($data);
        if($result){
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data telah Disetujui</div>');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Tidak Bisa Disetujui</div>');
        }
        redirect('Magang/daftarMagang');
    }

    public function tolak($kelompok=null){
        $data = array();
        $fullname = $this->Internship->getNIMByKelompok($kelompok);
        foreach ($fullname as $result) {
            array_push($data,array(
                'id'=>$result->id,    
                'status'=>'ditolak',                            
                )
            );
        }
        print_r(json_encode($data));
        $result = $this->Internship->updateByNIM($data);
        if($result){
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Telah Ditolak</div>');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger text-capitalize" role="alert">Data Tidak Bisa ditolak/div>');
        }
        redirect('Magang/daftarMagang');
    }

    public function delete($kelompok=null){
      $update = $this->Internship->updateIdKelompok($kelompok);
      if($update){
        $deleteMember=$this->Internship->DeleteMemberKelompok($kelompok);
        $deleteLeader=$this->Internship->DeleteLeaderKelompok($kelompok);
        if($deleteMember && $deleteLeader){
            $this->session->set_flashdata('message','<div class="alert alert-success text-capitalize" role="alert">Data berhasil dihapus</div>');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger text-capitalize" role="alert">Data Tidak Bisa Dihapus</div>');    
        }
      }else{
        $this->session->set_flashdata('message','<div class="alert alert-danger text-capitalize" role="alert">Data Tidak Bisa Dihapus</div>');
      }
      redirect('Magang/daftarMagang');
    }

    public function reCetak($kelompok=null){        
        $data= $this->Internship->getDataCetakBalasan($kelompok);
        foreach ($data as $result) {            
            $detail['nomorSurat'] = $result->nomorSurat;
            $detail['nomorLampiran'] = $result->jumlahLampiran;
            $detail['penerima'] = $result->namaPenerima;
            $detail['nomorBalasan'] = $result->nomorSuratBalasan;
            $detail['tempatTujuan'] = $result->tempatSurat;
            $detail['perihal'] = $result->perihal;		
            $tanggal= $result->tanggalSuratBalasan;
            $detail['tanggalBalasan'] = substr($tanggal,8,2);
            $detail['bulanBalasan'] = substr($tanggal,5,2);
            $detail['tahunBalasan'] = substr($tanggal,0,4);
        }
        switch($detail['bulanBalasan']){
            case '01':
                $detail['bulanBalasan']="Januari";
                break;
            case '02':
                $detail['bulanBalasan']="Februari";
            break;
            case '03':
                $detail['bulanBalasan']="Maret";
                break;
            case '04':
                $detail['bulanBalasan']="April";
                break;
            case '05':
                $detail['bulanBalasan']="Mei";
                break;
            case '06':
                $detail['bulanBalasan']="Juni";
                break;
            case '07':
                $detail['bulanBalasan']="Juli";
                break;
            case '08':
                $detail['bulanBalasan']="Agustus";
                break;
            case '09':
                $detail['bulanBalasan']="September";
                break;
            case '10':
                $detail['bulanBalasan']="Oktober";
                break;
            case '11':
                $detail['bulanBalasan']="November";
                break;
            case '12':
                $detail['bulanBalasan']="Desember";
                break;

        }
		$detail['tanggal'] = date('d');
		$detail['bulan'] = date('m');
		$detail['tahun'] = date('Y');		
		$detail['fullname'] = $this->Internship->getNameByKelompok($kelompok);
		$detail['department'] = $this->Internship->getDepartmentByKelompok($kelompok);
        $detail['institution'] = $this->Internship->getInstitutionByKelompok($kelompok);
        $detail['studyProgram']=$this->Internship->getProgramStudyByKelompok($kelompok);
        $detail['faculty']=$this->Internship->getFakultasByKelompok($kelompok);
        $detail['detail'] = $this->Internship->getRekapBalasanByKelompok($kelompok);	
        $this->load->view('print_balasan',$detail);
    }
}
