<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('indexModel');

		if(empty($this->session->userdata('token'))){
			redirect(base_url("login"));
		}
	}
	
	public function index(){
		$id_pj = $this->session->id;
		$data['jadwalH'] = $this->indexModel->getH($id_pj)->result();
		$this->load->view('beranda', $data);
	}
}
