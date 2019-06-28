<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {    

    public function getIdentityUser($id){
        $query = "select name,image from user where id=".$id;
        return $this->db->query($query)->row();  
    }

    public function getUser($username){
        return $this->db->get_where('user',['username'=>$username])->row();
    }

    public function getDaftarAdministrasi(){
        $query ="select user.id,user.username,role.roleName from user join role on user.roleId = role.id";
        return $this->db->query($query)->result();
    }

    public function addUser($username,$name,$role){
        $password=password_hash(123456,PASSWORD_DEFAULT);
        if($role=='Administrator'){
            $role=2;
        }else{
            $role=1;
        }
        $data= array (
            'username'=> $username,
            'password' =>$password,
            'name'=>$name,
            'image'=>'default.jpg',
            'roleId'=>$role
        );
        return $this->db->insert('user',$data);
    }
    
    public function deleteAdminBYId($id){
        return $this->db->delete('user',['id'=>$id]);
    }

    public function updateAdminById($id,$role){
        if($role=='Administrator'){
            $role=2;
        }else{
            $role=1;
        }
        return $this->db->update('user',['roleId'=>$role],['id'=>$id]);
    }

    public function updatePasswordByID($id,$password){
        return $this->db->update('user',['password'=>$password],['id'=>$id]);
    }

    

}