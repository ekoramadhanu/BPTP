<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UserControler extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('User');        
        $this->load->library('form_validation');
        if(!$this->session->userdata('roleId')){
            redirect('Auth');
        }
    }

    public function index(){
        // data dimasukkan ke dalam view header
        $data['title'] = 'Ganti Password';
        // data dimasukkan ke dalam view sidebar
        $role['id']=$this->session->userdata('id');        
        $role['role']=$this->session->userdata('roleId');
        $role['title'] = $data['title'];
        // data dimasukkan ke dalam view topbar
        $top['user']= $this->User->getIdentityUser($role['id']);      
        // validasi form
        $this->form_validation->set_rules('passwordBaru','passwordBaru','min_length[6]|max_length[12]|matches[password]',[
            'min_lenght'=>'kata sandi terlalu pendek',
            'max_lenght'=>'kata sandi terlalu panjang',
            'matches'=>'kata sandi baru tidak sama '
        ]);
        if(!$this->form_validation->run()){
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$role);
            $this->load->view('template/topbar',$top);
            $this->load->view('ganti_password');
            $this->load->view('template/footer');        
        }else{
            $this->gantiPassword();
        }
    }

    private function gantiPassword(){
        $role['id']=$this->session->userdata('id');  
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
            echo "b";
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Lama Anda Salah</div>');
        }
        redirect('UserControler');
    }

    public function logout(){
        $this->session->unset_userdata('roleId');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('tahun');
        $this->session->unset_userdata('nama');
        redirect('Auth');
    }

}
?>