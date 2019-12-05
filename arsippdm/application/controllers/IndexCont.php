<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('indexModel');

		if(empty($this->session->username)){
			redirect(base_url("login"));
		}
	}
	
	function index(){
		$data['arsip'] = $this->indexModel->getArsipLimit("4")->result();
		$this->load->view('beranda', $data);
	}

}
