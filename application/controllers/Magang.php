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
		for ($i=1; $i <=12 ; $i++) { 			
			$result['startMonth'][$i]= $this->Internship->getRekapByStartDatePKL($i,$result['tahunRekap']);								
		}
		for ($i=1; $i <= 12 ; $i++) { 
			for ($j=1; $j <$i ; $j++) { 								
				$result['endMonth'][$i][$j]= $this->Internship->getRekapByEndDatePKL($j,$result['tahunRekap'],$i,$result['tahunRekap']);
			}
		}
		for ($i=1; $i <=12 ; $i++) { 
			$result['jumlahStartDate'][$i]= $this->Internship->getCountByStartDatePKL($i,$result['tahunRekap']);
		}
		for ($i=1; $i <= 12 ; $i++) { 
			for ($j=1; $j <$i ; $j++) { 								
				$result['jumlahEndaDate'][$i][$j]= $this->Internship->getCountByEndDatePKL($j,$result['tahunRekap'],$i,$result['tahunRekap']);
			}
		}		
		$result['total'] = $this->Internship->getCountAllByYear($result['tahunRekap']);						
		$this->load->view('print_rekap',$result);
		

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
		$date = $this->input->get('tanggalSurat');
		$detail['tanggalBalasan'] = substr($date,8,2);
		$detail['bulanBalasan'] = substr($date,5,2);
		$detail['tahunBalasan'] = substr($date,0,4);
		$detail['tanggal'] = date('d');
		$detail['bulan'] = date('m');
		$detail['tahun'] = date('Y');		
		$detail['fullname'] = $this->Internship->getNameByKelompok($kelompok);
		$detail['department'] = $this->Internship->getDepartmentByKelompok($kelompok);
		$detail['institution'] = $this->Internship->getInstitutionByKelompok($kelompok);
		$detail['detail'] = $this->Internship->getRekapBalasanByKelompok($kelompok);						
		$this->load->view('print_balasan',$detail);
	}

	public function tambahData(){
        $role['id']=$this->session->userdata('id');       
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Tambah Data';
        $role['title'] = $data['title'];
        $top['user']= $this->User->getIdentityUser($role['id']);        
        // form validation
        $this->form_validation->set_rules('nama[]','nama','required|trim',[
            'required' =>'Nama Pemagang harus diisi',            
        ]);
        $this->form_validation->set_rules('nomor[]','nomor','required|trim|numeric',[
            'required' =>'NIM/NISN harus diisi', 
        ]);
        $this->form_validation->set_rules('sekolah','sekolah','required|trim',[
            'required' =>'Universitas / Sekolah harap harus diisi',            
        ]);
        $this->form_validation->set_rules('fakultas','fakultas','required|trim',[
            'required' =>'Program Studi harap harus diisi',            
        ]);
        $this->form_validation->set_rules('programStudi','programStudi','required|trim',[
            'required' =>'Program Studi harap harus diisi',            
        ]);
        $this->form_validation->set_rules('penempatanMagang','penempatanMagang','required|trim',[
            'required' =>'Penempatan magang harap diisi harap harus diisi',            
        ]);
        $this->form_validation->set_rules('pembimbingMagang','pembimbingMagang','required|trim',[
            'required' =>'Pembimbing Magang harap harus diisi',            
        ]);
        $this->form_validation->set_rules('pembimbingMagang','pembimbingMagang','required|trim',[
            'required' =>'Pembimbing Magang harap harus diisi',            
        ]);
        $this->form_validation->set_rules('tanggalMulai','tanggalMulai','required|trim',[
            'required' =>'Tanggal Mulai Magang harap harus diisi',            
        ]);
        $this->form_validation->set_rules('tanggalSelesai','tanggalSelesai','required|trim',[
            'required' =>'Tanggal Selesai Magang harap harus diisi',            
        ]);
        if($this->form_validation->run() == false){
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
        echo"berhasil";
        $nama = $this->input->post('nama');
        $nomor = $this->input->post('nomor');
        $jenisKelamin = $this->input->post('jenisKelamin');        
        $pekerjaan = $this->input->post('pekerjaan');        
        $programStudi = $this->input->post('programStudi');        
        $fakultas =$this->input->post('fakultas');
        if($pekerjaan=='siswa'){
            $pekerjaan=1;
            $fakultas='-';
        }else{
            $pekerjaan=0;
        }
        $sekolah = $this->input->post('sekolah');
        $penempatanMagang =$this->input->post('penempatanMagang');
        $pembimbingMagang =$this->input->post('pembimbingMagang');
        $tanggalMulai =$this->input->post('tanggalMulai');
        $tanggalBerakhir =$this->input->post('tanggalSelesai');    
        $data = array();
        $index = 0;           

        foreach ((array)$nomor as $result) {
            array_push($data,array(
                'id'=>$result,
                'fullname'=>$nama[$index],
                'studyProgram'=>$programStudi,
                'department'=>$fakultas,
                'institute'=>$sekolah,
                'gender'=>$jenisKelamin[$index],
                'status'=>'terdaftar',
                'place'=>$penempatanMagang,
                'guide'=>$pembimbingMagang,
                'id_kelompok'=>$nomor[0],
                'is_sekolah'=>$pekerjaan,
                'date_start'=>$tanggalMulai,
                'date_end'=>$tanggalBerakhir
                )
            );
            $index++;
        }
        print_r(json_encode($data));                
        $result = $this->Internship->insertNewInternship($data);
    }
}
