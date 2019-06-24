<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magang extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		// $this->load->library("mypdf");
		$this->load->model("Internship");		
	}

	public function index()
	{

	}
	
	public function cetakRekap(){
		$result['tahunRekap'] = $this->input->get('tahun');	
		for ($i=1; $i <=12 ; $i++) { 			
			$result['bulan'][$i]= $this->Internship->getRekapByMonthAndYear($i,$result['tahunRekap']);					
		}
		for ($i=1; $i <=12 ; $i++) { 			
			$result['jumlah'][$i]= $this->Internship->getCountByMonthAndyear($i,$result['tahunRekap']);
		}		
		$result['total'] = $this->Internship->getCountAllByYear($result['tahunRekap']);		
		$this->load->view('print_rekap',$result);		
		// $this->mypdf->generatePDF('print_rekap', $result,'RekapTahunan '.$detail['fullname'] ,'A4','Portrait');

	}

	public function cetakBalasan($kelompok = null){
		$detail['nomorSurat'] = $this->input->get('nomor');
		$detail['tujuan'] = $this->input->get('tujuan');
		$detail['tempat'] = $this->input->get('tempat');
		$detail['nomorbalasan'] = $this->input->get('balasan');
		$date = $this->input->get('tanggal');
		$detail['tanggalBalasan'] = substr($date,8,2);
		$detail['bulanBalasan'] = substr($date,5,2);
		$detail['tahunBalasan'] = substr($date,0,4);
		$detail['tanggal'] = date('d');
		$detail['bulan'] = date('m');
		$detail['tahun'] = date('Y');
		$detail['fullname'] = $this->Internship->getNameByKelompok($kelompok);
		$detail['detail'] = $this->Internship->getRekapBalasanByKelompok($kelompok);						
		$this->load->view('print_balasan',$detail);
	}
}
