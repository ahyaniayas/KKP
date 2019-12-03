<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('loginModel');
	}

	public function index(){
		$this->session->sess_destroy();
		$this->load->view('login');
	}

	public function loginAksi(){
		// header('Access-Control-Allow-Origin: *');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			"username" 	=> $username,
			"password" 	=> md5(md5(md5($password)))
		);
		$hasil = $this->loginModel->get($data)->result();
		// print_r($hasil);
		$cek = $this->loginModel->get($data)->num_rows();
		if($cek > 0){
			$data_session = (array) $hasil[0];

			$this->session->set_userdata($data_session);
			echo json_encode(array("Masuk Berhasil", ""));
		}else{
			http_response_code(500);
		}
	}
}
