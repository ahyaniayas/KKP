<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalDetailCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('jadwal/jadwalDetailModel');
	}

	function detail($link){
		$data['jadwalH'] = $this->jadwalDetailModel->getH($link)->result();
		$this->load->view('jadwalDetail/detail', $data);
	}

	function iuranTerkumpul($idH){
		$idH = base64_decode($idH);
		$data['jadwalH'] = $this->jadwalDetailModel->getIuranTerkumpul($idH)->result();
		$this->load->view('jadwalDetail/ajax/terkumpul', $data);
	}

	function tambah($idH){
		$idH = base64_decode($idH);
		$data['idH'] = $idH;
		$this->load->view('jadwalDetail/ajax/tambah', $data);
	}

	function tambahAksi(){
		$keterangan = $this->input->post("keterangan");
		$bayar = $this->input->post("bayar");
		$id_jadwal = $this->input->post("id_jadwal");
		$data = array(
			"keterangan" 	=> $keterangan,
			"bayar" 	=> str_replace(",","","$bayar"),
			"id_jadwal" => $id_jadwal
		);
		$last_id = $this->jadwalDetailModel->ins($data);
		echo json_encode(array("Tambah Berhasil", "tambah"));
	}

	function edit($id){
		$id = base64_decode($id);
		$data['jadwalH'] = $this->jadwalDetailModel->get($id)->result();
		$this->load->view('jadwalDetail/ajax/edit',$data);
	}

	function editAksi(){
		$id = $this->input->post("idjadwal_d");
		$keterangan = $this->input->post("keterangan");
		$bayar = $this->input->post("bayar");
		$data = array(
			"keterangan" 	=> $keterangan,
			"bayar" 	=> str_replace(",","","$bayar")
		);
		$this->jadwalDetailModel->upd($data, $id);
		echo json_encode(array("Edit Berhasil", ""));
	}

	function lihat($id){
		$id = base64_decode($id);
		$data['jadwalH'] = $this->jadwalDetailModel->get($id)->result();
		$data['parameter'] = "lihat";
		$this->load->view('jadwalDetail/ajax/edit',$data);
	}

	function hapus($id){
		$id = base64_decode($id);
		$data['jadwalH'] = $this->jadwalDetailModel->get($id)->result();
		$this->load->view('jadwalDetail/ajax/hapus',$data);
	}

	function hapusAksi(){
		$id = $this->input->post("idjadwal_d");
		$this->jadwalDetailModel->del($id);
		echo json_encode(array("Hapus Berhasil", ""));
	}

	function tbl($idH){
		$idH = base64_decode($idH);
		$data['jadwalDetail'] = $this->jadwalDetailModel->getAll($idH)->result();
		$data['id_pj'] = $this->jadwalDetailModel->getIdPj($idH)->result();
		$this->load->view('jadwalDetail/ajax/tbl', $data);
	}

}