<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('indexModel');

		if(empty($this->session->userdata('username'))){
			redirect(base_url("login"));
		}
	}
	
	public function index(){
		$this->load->view('beranda');
	}
}
