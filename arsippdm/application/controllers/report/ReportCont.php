<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ReportCont extends CI_Controller {

	function __construct(){   
		parent::__construct();
		$this->load->library('PdfLib');
		$this->load->model('arsip/arsipModel');

		if(empty($this->session->username)){
			redirect(base_url("login"));
		}
	}

	// function jadwal($link){
	// 	$data['jadwalH'] = $this->jadwalDetailModel->getH($link)->result();
	// 	$idH = $data['jadwalH'][0]->id;
	// 	$data['jadwalD'] = $this->jadwalDetailModel->getAll($idH)->result();
	// 	$data['terkumpul'] = $this->jadwalDetailModel->getIuranTerkumpul($idH)->result();
	// 	$this->load->view('report/jadwal.php', $data);
	// }

	function surat($id){
		$id = base64_decode($id);
		$where = "surat.arsip_id='$id'";
		$data['arsip'] = $this->arsipModel->get($id)->result();
		$data['surat'] = $this->arsipModel->getSuratWhere($where)->result();
		// print_r($data['surat']);
		$this->load->view('report/surat.php', $data);
	}
}
?>