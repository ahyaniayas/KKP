<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TampilanCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();		

		if(empty($this->session->username) || $this->session->no_induk!="999999999"){
			redirect(base_url("login"));
		}
	}

	function tampilan(){
		$this->load->view('tampilan/tampilan');
	}

	function tbl(){
		header("Cache-Control: no-cache, must-revalidate");
		$this->load->view('tampilan/ajax/tbl');
	}

	function tampilanAksi(){
		$msg = "Berhasil disimpan";
		if(!empty($_FILES["bg"])){
			$data = $this->aksi_upload("bg", 5120 , "bg.gambar");
			if(!empty($data["error"])){
				$msg = $data["error"];
			}
		}
		if(!empty($_FILES["label_panjang"])){
			$data = $this->aksi_upload("label_panjang", 512 , "label-panjang.gambar");
			if(!empty($data["error"])){
				$msg = $data["error"];
			}
		}
		if(!empty($_FILES["label"])){
			$data = $this->aksi_upload("label", 512 , "label.gambar");
			if(!empty($data["error"])){
				$msg = $data["error"];
			}
		}
		if(!empty($_FILES["label_kecil"])){
			$data = $this->aksi_upload("label_kecil", 512 , "label-kecil.gambar");
			if(!empty($data["error"])){
				$msg = $data["error"];
			}
		}
		echo json_encode(array($msg, ""));

	}

	function aksi_upload($input_name, $allow_size, $file_name){
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = '*';
		// $config['max_size'] = 0; // unlimited
		$config['max_size'] = $allow_size; // limited
		$config['file_name'] = $file_name;
		// $config['encrypt_name'] = TRUE;
		$config['overwrite'] = TRUE;
		// $config['max_width'] = 1024;
		// $config['max_height'] = 768;
 
		$this->load->library('upload', $config);
 
		if ( !$this->upload->do_upload($input_name)){
			$data = array('error' => $this->upload->display_errors());
		}else{
			$data = array('upload_data' => $this->upload->data());
			// print_r($data);
		}
		return $data;
	}

}