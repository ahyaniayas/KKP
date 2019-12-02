<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('jadwal/jadwalModel');

		if(empty($this->session->userdata('token'))){
			redirect(base_url("login"));
		}
	}

	function jadwal(){
		$this->load->view('jadwal/jadwal');
	}

	function jadwalTambah(){
		$this->load->view('jadwal/ajax/tambah');
	}

	function jadwalTambahAksi(){
		$tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));
		$deskripsi = $this->input->post("deskripsi");
		$lokasi = $this->input->post("lokasi");
		$iuran = $this->input->post("iuran");
		$id_pj = $this->session->id;
		$data = array(
			"tanggal" 	=> $tanggal,
			"deskripsi" => $deskripsi,
			"lokasi" 	=> $lokasi,
			"iuran" 	=> str_replace(",","","$iuran"),
			"id_pj" 	=> $id_pj,
			"status" 	=> "1"
		);
		$last_id = $this->jadwalModel->ins($data);

		$data = array(
			"link" 	=> $last_id.(date('d', strtotime($tanggal))).$last_id
		);
		$this->jadwalModel->upd($data, $last_id);
		echo json_encode(array("Tambah Berhasil", "tambah"));
	}

	function jadwalEdit($id){
		$id = base64_decode($id);
		$data['jadwalEdit'] = $this->jadwalModel->get($id)->result();
		$this->load->view('jadwal/ajax/edit',$data);
	}

	function jadwalEditAksi(){
		$id = $this->input->post("idjadwal_h");
		$tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));
		$deskripsi = $this->input->post("deskripsi");
		$lokasi = $this->input->post("lokasi");
		$iuran = $this->input->post("iuran");
		$status = $this->input->post("status");
		$data = array(
			"tanggal" 	=> $tanggal,
			"deskripsi" => $deskripsi,
			"lokasi" 	=> $lokasi,
			"iuran" 	=> str_replace(",","","$iuran"),
			"status" 	=> $status
		);
		$this->jadwalModel->upd($data, $id);
		echo json_encode(array("Edit Berhasil", ""));
	}

	function jadwalLihat($id){
		$id = base64_decode($id);
		$data['jadwalEdit'] = $this->jadwalModel->get($id)->result();
		$data['parameter'] = "lihat";
		$this->load->view('jadwal/ajax/edit',$data);
	}

	function jadwalHapus($id){
		$id = base64_decode($id);
		$data['jadwalEdit'] = $this->jadwalModel->get($id)->result();
		$this->load->view('jadwal/ajax/hapus',$data);
	}

	function jadwalHapusAksi(){
		$id = $this->input->post("idjadwal_h");
		$this->jadwalModel->del($id);
		echo json_encode(array("Hapus Berhasil", ""));
	}

	function jadwalTbl(){
		$iduserlogin = $this->session->userdata('id');
		if($iduserlogin==1){
			$data['jadwal'] = $this->jadwalModel->getAll()->result();
		}else{
			$data['jadwal'] = $this->jadwalModel->getPerIdUser($iduserlogin)->result();
		}
		$this->load->view('jadwal/ajax/tbl', $data);
	}

}