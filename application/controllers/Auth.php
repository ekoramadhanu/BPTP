<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function index(){
        $data['title']= 'Login';              
        $this->form_validation->set_rules('username','username','required|trim',[
            'required'=>'Username Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('password','Password','required|trim',[
            'required'=>'Password Tidak Boleh Kosong'
        ]);
        if($this->form_validation->run() == false){
            $this->load->view('template/auth_header',$data);
            $this->load->view('login');
            $this->load->view('template/auth_footer');   
        }else{
            $this->login();
        }

    }
    
    private function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user',['username'=>$username])->row_array();
        if($user && password_verify($password,$user['password'])){            
        $data= array(
            'username' =>$user['username'],
            'roleId' =>$user['roleId']
        );
        $this->session->set_userdata($data);            
        redirect('Home');            
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username dan Password Salah</div>');
            redirect('auth');
        }

    } 

    public function registrasi(){
        $title= 'registrasi';
        
        $this->form_validation->set_rules('username','username','required|trim',[
            'required'=>'Nama Lengkap Harus Diisi'
        ]);
        $this->form_validation->set_rules('password','Password','required|trim',[
            'required'=>'Nama Lengkap Harus Diisi'
        ]);

        if($this->form_validation->run()==false){
            $this->load->view('template/auth_header');
            $this->load->view('registrasi',$title);
            $this->load->view('template/auth_footer');
        }
        else {            
            $data=[
                'username' => htmlspecialchars($this->input->post('username',true)),                
                'password' =>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'roleId' => 1,
                'image' =>'default.jpg'                
            ];
            $this->db->insert('user',$data);
        }
    }
}