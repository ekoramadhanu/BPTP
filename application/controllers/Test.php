<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends  CI_Controller{

    public function __construct(){
        parent :: __construct();
        $this->load->model('Internship');
    }

    public function index(){
        $test=1;
        $result=$this->Internship->getCountAll($test);
        if($result){
            echo'berhasil';
        }else{
            echo 'b----';
        }

        
    }
}