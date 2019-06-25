<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {    

    public function getUser($username){
        return $this->db->get_where('user',['username'=>$username])->row();
    }

    public function getDaftarAdministrasi(){
        $query ="select user.username,role.roleName from user join role on user.roleId = role.id";
        return $this->db->query($query)->result();
    }
}