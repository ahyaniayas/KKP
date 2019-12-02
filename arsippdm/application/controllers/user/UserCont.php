<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('user/userModel');

		if(empty($this->session->userdata('token'))){
			redirect(base_url("login"));
		}
	}

	function user(){
		$this->load->view('user/user');
	}

	function userTambah(){
		$this->load->view('user/ajax/tambah');
	}

	function userTambahAksi(){
		$nama = $this->input->post("nama");
		$kontak = $this->input->post("kontak");
		$data = array(
			"nama" 		=> $nama,
			"kontak" 	=> $kontak
		);
		$last_id = $this->userModel->ins($data);

		$data = array(
			"token" 	=> $last_id.strtolower(substr($nama, 0, 3))
		);
		$this->userModel->upd($data, $last_id);
		echo json_encode(array("Tambah Berhasil", "tambah"));
	}

	function userEdit($id){
		$id = base64_decode($id);
		$data['userEdit'] = $this->userModel->get($id)->result();
		$this->load->view('user/ajax/edit',$data);
	}

	function userEditAksi(){
		$nama = $this->input->post("nama");
		$kontak = $this->input->post("kontak");
		$id = $this->input->post("iduser");
		$data = array(
			"nama" 		=> $nama,
			"kontak" 	=> $kontak
		);
		$this->userModel->upd($data, $id);
		echo json_encode(array("Edit Berhasil", ""));
	}

	function userLihat($id){
		$id = base64_decode($id);
		$data['userEdit'] = $this->userModel->get($id)->result();
		$data['parameter'] = "lihat";
		$this->load->view('user/ajax/edit',$data);
	}

	function userHapus($id){
		$id = base64_decode($id);
		$data['userEdit'] = $this->userModel->get($id)->result();
		$this->load->view('user/ajax/hapus',$data);
	}

	function userHapusAksi(){
		$id = $this->input->post("iduser");
		$this->userModel->del($id);
		echo json_encode(array("Hapus Berhasil", ""));
	}

	function userTbl(){
		$data['user'] = $this->userModel->getAll()->result();
		$this->load->view('user/ajax/tbl', $data);
	}

}