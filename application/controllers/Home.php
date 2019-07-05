<!-- 
    Nama                : Eko Ramadhanu Aryputra
    Tanggal Pembuatan   : 18 Juni 2019
    Keguanan kelas ini  : kelas ini digunakan sebagai controler yaitu sebagai penghubung antara view home dengan
                          beberapa model user dan internship

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
        $diagram['tersetujui'] = $this->Internship->getCountByStatusAndYear('tersetujui',$tahun);
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

    /*
       method daftarMagang ini digunakan untuk  menghubungkan anatara view daftar_magang
       dengan model User dan Internship
     */
    public function daftarMagang(){
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

    /*
       method daftarMagang ini digunakan untuk  menghubungkan anatara view daftar_magang
       dengan model User dan Internship
     */
    public function daftarAdministrator(){
        $role['id']=$this->session->userdata('id');        
        $role['role']=$this->session->userdata('roleId');
        if ($role['role'] == 1){
            $data['title'] = 'Daftar Administrator';
            $role['title'] = $data['title'];
            $top['user']= $this->User->getIdentityUser($role['id']);
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
        // data dimasukkan ke dalam view header
        $data['title'] = 'Ganti Password';
        // data dimasukkan ke dalam view sidebar
        $role['id']=$this->session->userdata('id');        
        $role['role']=$this->session->userdata('roleId');
        $role['title'] = $data['title'];
        // data dimasukkan ke dalam view topbar
        $top['user']= $this->User->getIdentityUser($role['id']);
        // validasi inputan
        $this->form_validation->set_rules('passwordLama','passwordLama','required|trim|min_length[6]|max_length[12]',[
            'required' =>'kata sandi harus diisi',
            'min_length'=>'kata sandi anda kurang dari 6 karakter',
            'max_length'=>'kata sandi anda lebih dari 12 karakter'
        ]);
        $this->form_validation->set_rules('passwordBaru','passwordBaru','required|trim|min_length[6]|max_length[12]|matches[repasswordBaru]',[
            'required' =>'kata sandi harus diisi',
            'min_length'=>'kata sandi anda kurang dari 6 karakter',
            'max_length'=>'kata sandi anda lebih dari 12 karakter',
            'matches'=>'kata sandi anda tidak sesuai'
        ]);
        $this->form_validation->set_rules('repasswordBaru','repasswordBaru','required|trim|min_length[6]|max_length[12]',[
            'required' =>'kata sandi harus diisi',
            'min_length'=>'kata sandi anda kurang dari 6 karakter',
            'max_length'=>'kata sandi anda lebih dari 12 karakter',
            'matches'=>'kata sandi anda tidak sesuai'
        ]);
        if($this->form_validation->run() ==false){
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$role);
            $this->load->view('template/topbar',$top);
            $this->load->view('ganti_password');
            $this->load->view('template/footer');
        }else{
            $passwordLama =$this->input->post('passwordLama');
            $username = $this->session->userdata('username');
            $user = $this->User->getUser($username);
            if( password_verify($passwordLama,$user->password)){
                $passwordBaru =password_hash($this->input->post('passwordBaru'),PASSWORD_DEFAULT);
                $gantiPassword = $this->User->updatePasswordByID($role['id'],$passwordBaru);
                if($gantiPassword){
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password Berhasil diganti</div>');
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password tidak berhasil diganti</div>');
                }
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Lama Anda Salah</div>');
            }
            redirect('Home/gantiPassword');
        }
    }

    /*
      method tambahData ini digunakan untuk menghubungkan anatara view tambah data dengan model
      User
     */
    public function tambahData(){
        $role['id']=$this->session->userdata('id');       
        $role['role']=$this->session->userdata('roleId');
        $data['title'] = 'Tambah Data';
        $role['title'] = $data['title'];
        $top['user']= $this->User->getIdentityUser($role['id']);
        // validasi inputan
        $this->form_validation->set_rules('nama','nama','required|trim',[
            'required' =>'Nama Pemagang harus diisi',            
        ]);
        $this->form_validation->set_rules('nomor','nomor','required|trim',[
            'required' =>'NIM/NISN harus diisi',            
        ]);
        $this->form_validation->set_rules('sekolah','sekolah','required|trim',[
            'required' =>'Universitas / Sekolah harap harus diisi',            
        ]);
        $this->form_validation->set_rules('fakultas','fakultas','required|trim',[
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
            // insertData();
        }
    }

    public function insertData(){
        $nama = $this->input->post('nama');
        $nomor = $this->input->post('nomor');
        $jenisKelamin = $this->input->post('jenisKelamin');        
        $pekerjaan = $this->input->post('pekerjaan');        
        if($pekerjaan=='siswa'){
            $pekerjaan=1;
        }else{
            $pekerjaan=0;
        }
        $sekolah = $this->input->post('sekolah');
        $fakultas =$this->input->post('fakultas');
        $penempatanMagang =$this->input->post('penempatanMagang');
        $pembimbingMagang =$this->input->post('pembimbingMagang');
        $tanggalMulai =$this->input->post('tanggalMulai');
        $tanggalBerakhir =$this->input->post('tanggalSelesai');    
        $data = array();
        $index = 0;           

        foreach ($nomor as $result) {
            array_push($data,array(
                'id'=>$result,
                'fullname'=>$nama[$index],
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
        $result = $this->Internship->insertNewInternship($data);        
    }

    /*
       method logout ini digunakan untuk menghapus session serta mengarahkan ke 
       controler Auth dengan method index
     */
    public function logout(){
        $this->session->unset_userdata('roleId');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('tahun');
        $this->session->unset_userdata('nama');
        redirect('Auth');
    }    

    public function test(){
       $tahun=$this->input->get('nama');
       echo $tahun;
    }
    
}








