<!-- 
    Nama                :
    Tanggal             :
    Kegunaan Kelas Ini  :
 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('User');
        $this->load->library('form_validation');
        if(!$this->session->userdata('roleId')){
            redirect('Auth');
        }
    }

    public function index(){

    }   

    public function tambahAdmin(){
        $username= htmlspecialchars($this->input->post('username'),true);
        $role= $this->input->post('role');
        $name=htmlspecialchars($this->input->post('name'));
        if($username=='' || $role=='' || $name==''){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data tidak bisa ditambah karena username, role, dan nama kosong</div>');
        }else{
            $result = $this->User->addUser($username,$name,$role);
            if($result){
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil ditambahkan</div>');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data gagal ditambahkan</div>');
            }
        }
        redirect('Home/daftarAdministrator');
    }

    public function deleteAdmin($id){

        $result=$this->User->deleteAdminBYId($id);
        if($result){
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data gagal dihapus</div>');
        }
        redirect('Home/daftarAdministrator');
    }

    public function updateAdminById($id){
        $role= $this->input->post('role');        
        if($role ==''){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data tidak bisa diupdate karena
             jenis pelaku kosong</div>');
        }else{
            $result=$this->User->updateAdminById($id,$role);
            if($result){
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil diupdate</div>');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data gagal diupdate</div>');
            }
        }
        redirect('Home/daftarAdministrator');
    }
}