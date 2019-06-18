<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function index(){
        $title= 'Login';
        $this->load->view('template/auth_header');
        $this->load->view('login',$title);
        $this->load->view('template/auth_footer');
    }
    
    public function login(){
        redirect('Admin');
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
                // 'create_at'=> time()
            ];
            $this->db->insert('user',$data);
        }
    }
}