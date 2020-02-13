<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('indexModel');
		$this->load->model('activity/activityModel');

		if(empty($this->session->username)){
			redirect(base_url("login"));
		}
	}
	
	function index(){
		$data['arsip'] = $this->indexModel->getArsipLimit("4")->result();
		$data['activity'] = $this->activityModel->getWhere("YEAR(created_on)=YEAR(NOW())")->result();
		$this->load->view('beranda', $data);
	}

}
