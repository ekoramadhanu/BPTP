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
        $role['id']=$this->session->userdata('id');        
        $role['role']=$this->session->userdata('roleId');
        if ($role['role'] == 1){
            // validasi form
            $this->form_validation->set_rules('username','username','is_unique[user.username]|alpha_dash',[
                'is_unique'=>'Nama Pengguna Sudah Ada Silahkan Cari yang Lainnya',
                'alpha_dash'=>'Nama Pengguna Hanya Boleh Huruf,Angka, dan Underscore'
            ]);
            $data['title'] = 'Daftar Administrator';
            $role['title'] = $data['title'];
            $top['user']= $this->User->getIdentityUser($role['id']);
            $result['user'] =$this->User->getDaftarAdministrasi();
            if(!$this->form_validation->run()){
                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar',$role);
                $this->load->view('template/topbar',$top);
                $this->load->view('daftar_administrator',$result);
                $this->load->view('template/footer',$data);
            }else{
                $this->tambahAdmin();
            }
        }else{
            $data['title'] = 'Error';                        
            $this->load->view('page_403',$data);
        }
    }   

    private function tambahAdmin(){
        $username= htmlspecialchars($this->input->post('username'),true);
        $role= $this->input->post('role');
        $name=htmlspecialchars($this->input->post('name'));
        $result = $this->User->addUser($username,$name,$role);        
        if($result){
            $this->session->set_flashdata('message','<div class="alert alert-success text-capitalize" role="alert">Data Berhasil ditambahkan</div>');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger text-capitalize" role="alert">Username sudah dipakai</div>');
        }
        redirect('Admin');
    }

    public function deleteAdmin($id){

        $result=$this->User->deleteAdminBYId($id);
        if($result){
            $this->session->set_flashdata('message','<div class="alert alert-success text-capitalize" role="alert">Data Berhasil dihapus</div>');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger text-capitalize" role="alert">Data gagal dihapus</div>');
        }
        redirect('Admin');
    }

    public function updateAdminById($id){
        $role= $this->input->post('role');        
        if($role ==''){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data tidak bisa diupdate karena
             jenis pelaku kosong</div>');
        }else{
            $result=$this->User->updateAdminById($id,$role);
            if($result){
                $this->session->set_flashdata('message','<div class="alert alert-success text-capitalize" role="alert">Data Berhasil diupdate</div>');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger text-capitalize" role="alert">Data gagal diupdate</div>');
            }
        }
        redirect('Admin');
    }
}