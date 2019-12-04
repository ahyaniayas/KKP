<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArsipCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','download'));
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

	function tambahSuratAksi(){
		$arsip_id = $this->input->post("arsip_id");
		$nomor = $this->input->post("nomor");
		$tglsurat = $this->input->post("tglsurat");
		$perihal = $this->input->post("perihal");
		$jenissurat = $this->input->post("jenissurat");
		$tujuandari = $this->input->post("tujuandari");

		$file_name = $_FILES["file"]['name'];
		$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
		$file = $nomor.".".$file_ext;

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		$data = array(
			"arsip_id" => $arsip_id,
			"nomor" => $nomor,
			"tglsurat" => date("Y-m-d", strtotime($tglsurat)),
			"perihal" => $perihal,
			"jenissurat" => $jenissurat,
			"tujuandari" => $tujuandari,
			"file" => $file,

			"created_by" 	=> $oleh,
			"created_on" 	=> $pada
		);
		
		$this->arsipModel->insSurat($data);
		$this->aksi_upload($file);

		echo json_encode(array("Tambah Berhasil", "tambah"));
	}

	function editSurat($id){
		$id = base64_decode($id);
		$where = "surat_id='$id'";
		$data['surat'] = $this->arsipModel->getSuratWhere($where)->result();
		$this->load->view('arsip/ajax/surat/edit',$data);
	}

	function lihatSurat($id){
		$id = base64_decode($id);
		$where = "surat_id='$id'";
		$data['surat'] = $this->arsipModel->getSuratWhere($where)->result();
		$data['parameter'] = "lihat";
		$this->load->view('arsip/ajax/surat/edit',$data);
	}

	function editSuratAksi(){
		$id = $this->input->post("surat_id");
		$nomor = $this->input->post("nomor");
		$tglsurat = $this->input->post("tglsurat");
		$perihal = $this->input->post("perihal");
		$jenissurat = $this->input->post("jenissurat");
		$tujuandari = $this->input->post("tujuandari");
		$file_lama = $this->input->post("file_lama");

		$file_name = $_FILES["file"]['name'];

		if(empty($file_name)){
			$file = $file_lama;
		}else{
			unlink("./upload/".$file_lama);
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			$file = $nomor.".".$file_ext;
		}
		// echo $file;

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		$data = array(
			"tglsurat" => date("Y-m-d", strtotime($tglsurat)),
			"perihal" => $perihal,
			"jenissurat" => $jenissurat,
			"tujuandari" => $tujuandari,
			"file" => $file,

			"updated_by" 	=> $oleh,
			"updated_on" 	=> $pada
		);
		
		$this->arsipModel->updSurat($data, $id);
		$this->aksi_upload($file);

		echo json_encode(array("Edit Berhasil", ""));
	}

	function hapusSurat($id){
		$id = base64_decode($id);
		$where = "surat_id='$id'";
		$data['surat'] = $this->arsipModel->getSuratWhere($where)->result();
		$this->load->view('arsip/ajax/surat/hapus',$data);
	}

	function hapusSuratAksi(){
		$id = $this->input->post("surat_id");
		$file = $this->input->post("file");
		$this->arsipModel->delSurat($id);
		unlink("./upload/".$file);
		echo json_encode(array("Hapus Berhasil", ""));
	}

	function aksi_upload($file_name){
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		$config['file_name'] = $file_name;
		// $config['encrypt_name'] = TRUE;
		// $config['overwrite'] = FALSE;
		// $config['max_width'] = 1024;
		// $config['max_height'] = 768;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			// print_r($error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			// print_r($data);
		}
	}
 
	function downloadSurat($file){
		$file = base64_decode($file);			
		force_download('upload/'.$file, NULL);
	}

}