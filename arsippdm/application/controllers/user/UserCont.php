<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('user/userModel');
		$this->load->model('activity/activityModel');

		if(empty($this->session->username) || $this->session->no_induk!="999999999"){
			redirect(base_url("login"));
		}
	}

	function user(){
		$this->load->view('user/user');
	}

	function userTbl(){
		$data['user'] = $this->userModel->getAll()->result();
		$this->load->view('user/ajax/tbl', $data);
	}

	function userTambah(){
		$this->load->view('user/ajax/tambah');
	}

	function userTambahAksi(){

		$no_induk = $this->input->post("no_induk");
		$nama = $this->input->post("nama");
		$username = $this->input->post("username");

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		$whereCek1 = "no_induk='$no_induk'";
		$jmlCek1 = $this->userModel->getWhere($whereCek1)->num_rows();

		$whereCek2 = "username='$username'";
		$jmlCek2 = $this->userModel->getWhere($whereCek2)->num_rows();

		if($jmlCek1>0){
			echo json_encode(array("Tambah Gagal, No Induk duplikat", ""));
		}elseif($jmlCek2>0){
			echo json_encode(array("Tambah Gagal, Username duplikat", ""));
		}else{

			$data = array(
				"no_induk" 		=> $no_induk,
				"nama" 		=> $nama,
				"username" 	=> $username,
				"password" 		=> md5(md5(md5("123456"))),

				"created_by" 	=> $oleh,
				"created_on" 	=> $pada
			);
			$this->userModel->ins($data);

			// add to activity
			$ketActivity = "Menambahkan User ".$username;
			$dataActivity = array(
				"keterangan" 	=> $ketActivity,
				"created_by" 	=> $oleh,
				"created_on" 	=> $pada
			);
			$this->activityModel->ins($dataActivity);

			echo json_encode(array("Tambah Berhasil", "tambah"));
		}
	}

	function userEdit($id){
		$id = base64_decode($id);
		$data['user'] = $this->userModel->get($id)->result();
		$this->load->view('user/ajax/edit',$data);
	}

	function userLihat($id){
		$id = base64_decode($id);
		$data['user'] = $this->userModel->get($id)->result();
		$data['parameter'] = "lihat";
		$this->load->view('user/ajax/edit',$data);
	}

	function userEditAksi(){
		$id = $this->input->post("user_id");

		$no_induk = $this->input->post("no_induk");
		$nama = $this->input->post("nama");
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$no_induk_lama = $this->input->post("no_induk_lama");
		$username_lama = $this->input->post("username_lama");

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		$whereCek1 = "no_induk='$no_induk'";
		$jmlCek1 = $this->userModel->getWhere($whereCek1)->num_rows();

		// $whereCek2 = "username='$username'";
		// $jmlCek2 = $this->userModel->getWhere($whereCek2)->num_rows();

		if($jmlCek1>0 && $no_induk!=$no_induk_lama){
			echo json_encode(array("Edit Gagal, No Induk duplikat", ""));
		// }elseif($jmlCek2>0 && $username!=$username_lama){
		// 	echo json_encode(array("Edit Gagal, Username duplikat", ""));
		}else{

			$data = array(
				"no_induk" 		=> $no_induk,
				"nama" 		=> $nama,
				// "username" 	=> $username,

				"updated_by" 	=> $oleh,
				"updated_on" 	=> $pada
			);
			if(!empty($password)){
				$data["password"] = md5(md5(md5($password)));
				$data["password_text"] = $password;
			}
			$this->userModel->upd($data, $id);

			// add to activity
			$ketActivity = "Merubah User ".$username;
			$dataActivity = array(
				"keterangan" 	=> $ketActivity,
				"created_by" 	=> $oleh,
				"created_on" 	=> $pada
			);
			$this->activityModel->ins($dataActivity);

			echo json_encode(array("Edit Berhasil", ""));
		}
	}

	function userHapus($id){
		$id = base64_decode($id);
		$data['user'] = $this->userModel->get($id)->result();
		$this->load->view('user/ajax/hapus',$data);
	}

	function userHapusAksi(){
		$id = $this->input->post("user_id");
		$no_induk = $this->input->post("no_induk");
		$username = $this->input->post("username");
		
		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		if($no_induk=="999999999"){
			echo json_encode(array("Hapus Gagal, admin tidak bisa dihapus", ""));
		}else{
			$this->userModel->del($id);

			// add to activity
			$ketActivity = "Menghapus User ".$username;
			$dataActivity = array(
				"keterangan" 	=> $ketActivity,
				"created_by" 	=> $oleh,
				"created_on" 	=> $pada
			);
			$this->activityModel->ins($dataActivity);

			echo json_encode(array("Hapus Berhasil", ""));
		}
	}

}