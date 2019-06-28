<!-- 
    Nama                : Eko Ramadhanu Aryputra
    Tanggal Pembuatan   : 27 Juni 2019
    Keguanan kelas ini  : kelas ini digunakan sebagai controler yaitu sebagai penghubung antara view home dengan
                          beberapa model user dan internship

 -->
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {
    
    public function  __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        if(!$this->session->userdata('roleId')){
            redirect('Auth');
        }
    }

    public function index(){                
        $this->form_validation->set_rules('passwordLama','passwordLama','required|trim|min_length[6]|max_length[12]',[
            'required' =>'kata sandi harus diisi'
        ]);
        $this->form_validation->set_rules('passwordBaru','passwordBaru','required|trim|min_length[6]|max_length[12]|matches[repasswordBaru]',[
            'required' =>'kata sandi harus diisi'
        ]);
        $this->form_validation->set_rules('repasswordBaru','repasswordBaru','required|trim|min_length[6]|max_length[12]',[
            'required' =>'kata sandi harus diisi'
        ]);

        if($this->form_validation->run()==false){
            redirect('Home/gantiPassword');
        }else{

        }

    }
}