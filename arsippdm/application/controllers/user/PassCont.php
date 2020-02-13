<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PassCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('user/userModel');
		$this->load->model('activity/activityModel');

		if(empty($this->session->username)){
			redirect(base_url("login"));
		}
	}

	function gantiPass($id){
		$id = base64_decode($id);
		$data['user'] = $this->userModel->get($id)->result();
		$this->load->view('ajax/gantipassword',$data);
	}

	function gantiPassAksi(){
		$id = $this->input->post("user_id");

		$password = $this->input->post("password");
		$password_lama = md5(md5(md5($this->input->post("password_lama"))));
		$password_baru = $this->input->post("password_baru");

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		if($password!=$password_lama){
			echo json_encode(array("Ganti Password Gagal, Password lama salah", ""));
		}else{

			$data = array(
				"password" 		=> md5(md5(md5($password_baru))),
				"password_text" 		=> $password_baru,

				"updated_by" 	=> $oleh,
				"updated_on" 	=> $pada
			);
			$this->userModel->upd($data, $id);

			// add to activity
			$ketActivity = "Merubah Password";
			$dataActivity = array(
				"keterangan" 	=> $ketActivity,
				"created_by" 	=> $oleh,
				"created_on" 	=> $pada
			);
			$this->activityModel->ins($dataActivity);

			echo json_encode(array("Ganti Password Berhasil", ""));
		}
	}

}