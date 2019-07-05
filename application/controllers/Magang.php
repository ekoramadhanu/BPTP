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
		$this->load->model("Internship");		
		$this->load->library('form_validation');
		if(!$this->session->userdata('roleId')){
            redirect('Auth');
        }
	}

	public function index()
	{

	}
	
	public function cetakRekap(){		
		$result['tahunRekap'] = $this->input->get('tahun');	
		for ($i=1; $i <=12 ; $i++) { 			
			$result['startMonth'][$i]= $this->Internship->getRekapByStartDatePKL($i,$result['tahunRekap']);								
		}
		for ($i=1; $i <= 12 ; $i++) { 
			for ($j=1; $j <$i ; $j++) { 								
				$result['endMonth'][$i][$j]= $this->Internship->getRekapByEndDatePKL($j,$result['tahunRekap'],$i,$result['tahunRekap']);
			}
		}
		for ($i=1; $i <=12 ; $i++) { 
			$result['jumlahStartDate'][$i]= $this->Internship->getCountByStartDatePKL($i,$result['tahunRekap']);
		}
		for ($i=1; $i <= 12 ; $i++) { 
			for ($j=1; $j <$i ; $j++) { 								
				$result['jumlahEndaDate'][$i][$j]= $this->Internship->getCountByEndDatePKL($j,$result['tahunRekap'],$i,$result['tahunRekap']);
			}
		}		
		$result['total'] = $this->Internship->getCountAllByYear($result['tahunRekap']);						
		$this->load->view('print_rekap',$result);
		

	}

	public function cetakBalasan($kelompok = null){
		$detail['nomorSurat'] = $this->input->get('nomorSurat');
		$detail['nomorLampiran'] = $this->input->get('nomorLampiran');
		$detail['penerima'] = $this->input->get('penerima');
		$detail['nomorBalasan'] = $this->input->get('nomorBalasan');
		$detail['tempatTujuan'] = $this->input->get('tempatTujuan');
		$date = $this->input->get('tanggalSurat');
		$detail['tanggalBalasan'] = substr($date,8,2);
		$detail['bulanBalasan'] = substr($date,5,2);
		$detail['tahunBalasan'] = substr($date,0,4);
		$detail['tanggal'] = date('d');
		$detail['bulan'] = date('m');
		$detail['tahun'] = date('Y');		
		$detail['fullname'] = $this->Internship->getNameByKelompok($kelompok);
		$detail['department'] = $this->Internship->getDepartmentByKelompok($kelompok);
		$detail['institution'] = $this->Internship->getInstitutionByKelompok($kelompok);
		$detail['detail'] = $this->Internship->getRekapBalasanByKelompok($kelompok);						
		$this->load->view('print_balasan',$detail);
	}
}
