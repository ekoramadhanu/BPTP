<!-- 
    Nama                : Eko Ramadhanu Aryputra
    Tanggal Pembuatan   : 17 Juni 2019
    Keguanan kelas ini  :kelas ini digunakan sebagai controler yaitu sebagai penghubung antara view login
                         dengan model User

 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    /*
     Konstruktor yang digunakan untuk memanggil library CI form validation 
     serta model User yang akan digunakan. 
     */
    public function __construct(){
		parent::__construct();        
        $this->load->model('User');
        $this->load->library('form_validation');
        if($this->session->userdata('roleId')){
            redirect('Home');
        }
    }
    
    /*     
     sebuah method index yang akan dijalankan pertama kali oleh CI untuk menghubungkan antara view 
     login dengan method login  
     */
    public function index(){
        $data['title']= 'Login';                              
        $this->load->view('template/header',$data);
        $this->load->view('login');
        $this->load->view('template/footer');           
    }

    /*
     sebuah method yang hanya bisa diakses di dalam kelas ini untuk mengatur mengenai login 
     dari view login 
     */
    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->User->getUser($username);
        if($user){
            if($user && password_verify($password,$user->password)){            
                $data= array(            
                    'roleId' =>$user->roleId,
                    'id'=>$user->id,
                    'username'=>$user->username
                );
                $this->session->set_userdata($data);            
                redirect('Home');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Kata Sandi Salah</div>');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Nama Pengguna Tidak Terdaftar</div>');
            redirect('auth');
        }
        

    } 

    public function resetKataSandi(){
        $data['title']= 'Reset Password'; 
        $this->form_validation->set_rules('password','password','min_length[6]|max_length[12]|matches[repassword]',[
            'min_length'=>'Kata Sandi Tidak Boleh Kurang Dari Enam',
            'max_length'=>'Kata Sandi Tidak Boleh Lebih Dari Dua belas',
            'matches'=>'Kata Sandi Tidak Sama'
        ]);
        $this->form_validation->set_rules('repassword','repassword','min_length[6]|max_length[12]',[
            'min_length'=>'Kata Sandi Tidak Boleh Kurang Dari Enam',
            'max_length'=>'Kata Sandi Tidak Boleh Lebih Dari Dua belas'      
        ]);
        if(!$this->form_validation->run()){
            $this->load->view('template/header',$data);
            $this->load->view('reset_password');
            $this->load->view('template/footer');           
        }else{
            $this->changePassword();
        }
    }

    public function changePassword(){
        $username =$this->input->post('username');
        $password =$this->input->post('repassword');
        $passwordBaru =password_hash($this->input->post('password'),PASSWORD_DEFAULT);        
        $user = $this->User->getUser($username);
        if($user){
            $gantiPassword = $this->User->updatePasswordByID($user->id,$passwordBaru);
            if($gantiPassword){
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Kata Sandi Berhasil diganti</div>');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Kata Sandi Tidak Berhasil diganti</div>');
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Nama Pengguna Tidak Terdaftar</div>');
        }
        redirect('Auth/resetKataSandi');
    }
    
}