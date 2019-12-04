<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArsipCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('arsip/arsipModel');

		if(empty($this->session->username)){
			redirect(base_url("login"));
		}
	}

	function arsip(){
		$this->load->view('arsip/arsip');
	}

	function tbl(){
		$data['arsip'] = $this->arsipModel->getAll()->result();
		$this->load->view('arsip/ajax/arsip/tbl', $data);
	}

	function tambah(){
		$this->load->view('arsip/ajax/arsip/tambah');
	}

	function tambahAksi(){
		$nama_arsip = $this->input->post("nama_arsip");
		$keterangan = $this->input->post("keterangan");

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		$data = array(
			"nama_arsip" 	=> $nama_arsip,
			"keterangan" => $keterangan,

			"created_by" 	=> $oleh,
			"created_on" 	=> $pada
		);
		
		$this->arsipModel->ins($data);

		echo json_encode(array("Tambah Berhasil", "tambah"));
	}

	function edit($id){
		$id = base64_decode($id);
		$data['arsip'] = $this->arsipModel->get($id)->result();
		$this->load->view('arsip/ajax/arsip/edit',$data);
	}

	function lihat($id){
		$id = base64_decode($id);
		$data['arsip'] = $this->arsipModel->get($id)->result();
		$data['parameter'] = "lihat";
		$this->load->view('arsip/ajax/arsip/edit',$data);
	}

	function editAksi(){
		$id = $this->input->post("arsip_id");

		$nama_arsip = $this->input->post("nama_arsip");
		$keterangan = $this->input->post("keterangan");

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		$data = array(
			"nama_arsip" 	=> $nama_arsip,
			"keterangan" => $keterangan,

			"updated_by" 	=> $oleh,
			"updated_on" 	=> $pada
		);

		$this->arsipModel->upd($data, $id);
		echo json_encode(array("Edit Berhasil", ""));
	}

	function hapus($id){
		$id = base64_decode($id);
		$data['arsip'] = $this->arsipModel->get($id)->result();
		$this->load->view('arsip/ajax/arsip/hapus',$data);
	}

	function hapusAksi(){
		$id = $this->input->post("arsip_id");
		$this->arsipModel->del($id);
		echo json_encode(array("Hapus Berhasil", ""));
	}

	function surat($id){
		$id = base64_decode($id);
		$data['arsip'] = $this->arsipModel->get($id)->result();
		$this->load->view('arsip/surat',$data);
	}

	function tblSurat($id){
		$id = base64_decode($id);
		$where = "arsip_id='$id'";
		$data['surat'] = $this->arsipModel->getSuratWhere($where)->result();
		$this->load->view('arsip/ajax/surat/tbl', $data);
	}

	function tambahSurat($id){
		$id = base64_decode($id);
		$data["idH"] = $id;
		$this->load->view('arsip/ajax/surat/tambah', $data);
	}

}