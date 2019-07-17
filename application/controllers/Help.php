<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {
    public function __construct(){
        parent:: __construct();        
        if(!$this->session->userdata('roleId')){
            redirect('Auth');
        }
    }

    public function index(){
        $this->load->view('Bantuan/header');
        $this->load->view('Bantuan/sidebar');
        $this->load->view('Bantuan/bantuan');
        $this->load->view('Bantuan/footer');         
    }

    public function alurPenerimaanMagang(){
        $this->load->view('Bantuan/header');
        $this->load->view('Bantuan/sidebar');
        $this->load->view('Bantuan/alur_penerimaan');
        $this->load->view('Bantuan/footer');         
    }

    public function cetakSuratBalasan(){
        $this->load->view('Bantuan/header');
        $this->load->view('Bantuan/sidebar');
        $this->load->view('Bantuan/cetak_surat_balasan');
        $this->load->view('Bantuan/footer');         
    }

    public function cetakLaporan(){
        $this->load->view('Bantuan/header');
        $this->load->view('Bantuan/sidebar');
        $this->load->view('Bantuan/cetak_rekap');
        $this->load->view('Bantuan/footer');         
    }

    public function tambahData(){
        $this->load->view('Bantuan/header');
        $this->load->view('Bantuan/sidebar');
        $this->load->view('Bantuan/menambah_data');
        $this->load->view('Bantuan/footer');         
    }

    public function membuatAkun(){
        $this->load->view('Bantuan/header');
        $this->load->view('Bantuan/sidebar');
        $this->load->view('Bantuan/membuat_akun');
        $this->load->view('Bantuan/footer');         
    }

    public function menghapusAkun(){
        $this->load->view('Bantuan/header');
        $this->load->view('Bantuan/sidebar');
        $this->load->view('Bantuan/menghapus_akun');
        $this->load->view('Bantuan/footer');         
    }

    public function mengubahHakAkses(){
        $this->load->view('Bantuan/header');
        $this->load->view('Bantuan/sidebar');
        $this->load->view('Bantuan/mengubah_hak_akses');
        $this->load->view('Bantuan/footer');         
    }

    public function menggantiKataSandi(){
        $this->load->view('Bantuan/header');
        $this->load->view('Bantuan/sidebar');
        $this->load->view('Bantuan/mengganti_kata_sandi');
        $this->load->view('Bantuan/footer');         
    }


}