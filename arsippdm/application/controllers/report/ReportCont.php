<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ReportCont extends CI_Controller {

	function __construct(){   
		parent::__construct();
		$this->load->library('PdfLib');
		$this->load->model('jadwal/jadwalDetailModel');
	}

	function jadwal($link){
		$data['jadwalH'] = $this->jadwalDetailModel->getH($link)->result();
		$idH = $data['jadwalH'][0]->id;
		$data['jadwalD'] = $this->jadwalDetailModel->getAll($idH)->result();
		$data['terkumpul'] = $this->jadwalDetailModel->getIuranTerkumpul($idH)->result();
		$this->load->view('report/jadwal.php', $data);
	}
}
?>