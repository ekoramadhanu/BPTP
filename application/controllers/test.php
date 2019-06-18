<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {
    public function index(){
        $role= 1;
        $query =("SELECT role_akses.nama from role join role_akses on role.id = role_id where role_id =".$role);
        $data= $this->db->query($query)->result_array();                
        $this->load->view('template/auth_header');           
        $this->load->view('test');
        $this->load->view('template/auth_footer');           
    }
}
