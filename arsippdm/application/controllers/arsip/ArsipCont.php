<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArsipCont extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('arsip/arsipModel');
		$this->load->model('activity/activityModel');

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
		$progress = $this->input->post("progress");

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		$whereCek = "nama_arsip='$nama_arsip'";
		$jmlCek = $this->arsipModel->getWhere($whereCek)->num_rows();

		if($jmlCek>0){
			echo json_encode(array("Tambah Gagal, Nama arsip duplikat", ""));
		}else{

			$data = array(
				"nama_arsip" 	=> $nama_arsip,
				"keterangan" => $keterangan,
				"progress" => $progress,

				"created_by" 	=> $oleh,
				"created_on" 	=> $pada
			);
			$this->arsipModel->ins($data);

			// add to activity
			$ketActivity = "Menambahkan Arsip ".$nama_arsip;
			$dataActivity = array(
				"keterangan" 	=> $ketActivity,
				"created_by" 	=> $oleh,
				"created_on" 	=> $pada
			);
			$this->activityModel->ins($dataActivity);

			echo json_encode(array("Tambah Berhasil", "tambah"));
		}
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
		$progress = $this->input->post("progress");

		$nama_arsip_lama = $this->input->post("nama_arsip_lama");

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		$whereCek = "nama_arsip='$nama_arsip'";
		$jmlCek = $this->arsipModel->getWhere($whereCek)->num_rows();

		if($jmlCek>0 && $nama_arsip!=$nama_arsip_lama){
			echo json_encode(array("Edit Gagal, Nama arsip duplikat", ""));
		}else{

			$data = array(
				"nama_arsip" 	=> $nama_arsip,
				"keterangan" => $keterangan,
				"progress" => $progress,

				"updated_by" 	=> $oleh,
				"updated_on" 	=> $pada
			);
			$this->arsipModel->upd($data, $id);

			// add to activity
			$ketActivity = "Merubah Arsip ".$nama_arsip;
			$dataActivity = array(
				"keterangan" 	=> $ketActivity,
				"created_by" 	=> $oleh,
				"created_on" 	=> $pada
			);
			$this->activityModel->ins($dataActivity);

			echo json_encode(array("Edit Berhasil", ""));
		}
	}

	function hapus($id){
		$id = base64_decode($id);
		$data['arsip'] = $this->arsipModel->get($id)->result();
		$this->load->view('arsip/ajax/arsip/hapus',$data);
	}

	function hapusAksi(){
		$id = $this->input->post("arsip_id");
		$nama_arsip = $this->input->post("nama_arsip");

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		$this->arsipModel->del($id);

		// add to activity
		$ketActivity = "Menghapus Arsip ".$nama_arsip;
		$dataActivity = array(
			"keterangan" 	=> $ketActivity,
			"created_by" 	=> $oleh,
			"created_on" 	=> $pada
		);
		$this->activityModel->ins($dataActivity);

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

		$data_no_agenda = $this->arsipModel->getNoAgenda()->result();
		$max_no_agenda = empty($data_no_agenda[0]->max_no_agenda)? "": $data_no_agenda[0]->max_no_agenda;
		$max_tahun_agenda = empty($data_no_agenda[0]->tahun)? "": $data_no_agenda[0]->tahun;
		$tahun_sekarang = (string) date("Y");

		$no_agenda = ($tahun_sekarang>$max_tahun_agenda)? "1": $max_no_agenda+1;
		$data["no_agenda"] = str_pad($no_agenda, 5, '0', STR_PAD_LEFT);

		$this->load->view('arsip/ajax/surat/tambah', $data);
	}

	function tambahSuratAksi(){
		$arsip_id = $this->input->post("arsip_id");
		$jenissurat = $this->input->post("jenissurat");
		$no_agenda = $this->input->post("no_agenda");
		$tahun = date("Y");
		$nomor = $this->input->post("nomor");
		$tglditerima = $this->input->post("tglditerima");
		$tglsurat = $this->input->post("tglsurat");
		$perihal = $this->input->post("perihal");
		$pengirim = $this->input->post("pengirim");
		$penerima = $this->input->post("penerima");
		$disposisi = $this->input->post("disposisi");

		$file_name = $_FILES["file"]['name'];

		if(empty($file_name)){
			$file = "";
		}else{
			$nomorfix = $this->charReplace($nomor);
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			if($jenissurat=="MASUK"){
				$file = $nomorfix."-".$no_agenda.$tahun.".".$file_ext;
			}elseif ($jenissurat=="KELUAR") {
				$file = $nomorfix.".".$file_ext;
			}
		}

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");

		$jmlCek = "";
		if($jenissurat=="KELUAR"){
			$whereCek = "nomor='$nomor' && jenissurat='KELUAR'";
			$jmlCek = $this->arsipModel->getSuratWhere($whereCek)->num_rows();
		}

		if($jmlCek>0){
			echo json_encode(array("Tambah Gagal, Nomor surat duplikat", ""));
		}else{
			$data = array(
				"arsip_id" => $arsip_id,
				"jenissurat" => $jenissurat,
				"nomor" => $nomor,
				"tglditerima" => $jenissurat=="MASUK"? date("Y-m-d", strtotime($tglditerima)): "",
				"tglsurat" => date("Y-m-d", strtotime($tglsurat)),
				"perihal" => $perihal,
				"pengirim" => $pengirim,
				"penerima" => $penerima,
				"disposisi" => $disposisi,
				"file" => $file,

				"created_by" 	=> $oleh,
				"created_on" 	=> $pada
			);
			$surat_id = $this->arsipModel->insSurat($data);

			if($jenissurat=="MASUK"){
				$dataNoAgenda = array(
					"no_agenda" => $no_agenda,
					"surat_id" => $surat_id,
					"tahun" => $tahun
				);
				$this->arsipModel->insNoAgenda($dataNoAgenda);
			}

			$this->aksi_upload($file);

			// Update arsip
			$data_update_arsip = array(
				"updated_by" 	=> $oleh,
				"updated_on" 	=> $pada
			);
			$this->arsipModel->upd($data_update_arsip, $arsip_id);
			// Update arsip

			// add to activity
			$ketActivity = "Menambahkan Surat ".(!empty($no_agenda)? $no_agenda." - ": "").$nomor;
			$dataActivity = array(
				"keterangan" 	=> $ketActivity,
				"created_by" 	=> $oleh,
				"created_on" 	=> $pada
			);
			$this->activityModel->ins($dataActivity);

			echo json_encode(array("Tambah Berhasil", "tambah"));
		}
	}

	function editSurat($id){
		$id = base64_decode($id);
		$where = "surat.surat_id='$id'";
		$data['surat'] = $this->arsipModel->getSuratWhere($where)->result();
		$this->load->view('arsip/ajax/surat/edit',$data);
	}

	function lihatSurat($id){
		$id = base64_decode($id);
		$where = "surat.surat_id='$id'";
		$data['surat'] = $this->arsipModel->getSuratWhere($where)->result();
		$data['parameter'] = "lihat";
		$this->load->view('arsip/ajax/surat/edit',$data);
	}

	function editSuratAksi(){
		$id = $this->input->post("surat_id");
		$arsip_id = $this->input->post("arsip_id");
		$jenissurat = $this->input->post("jenissurathide");
		$nomor = $this->input->post("nomor");
		$tglditerima = $this->input->post("tglditerima");
		$tglsurat = $this->input->post("tglsurat");
		$perihal = $this->input->post("perihal");
		$pengirim = $this->input->post("pengirim");
		$penerima = $this->input->post("penerima");
		$disposisi = $this->input->post("disposisi");

		$file_lama = $this->input->post("file_lama");
		$nomor_lama = $this->input->post("nomor_lama");
		$no_agenda = $this->input->post("no_agenda");
		$tahun = $this->input->post("tahun");

		$file_name = $_FILES["file"]['name'];

		$jmlCek = "";
		if($jenissurat=="KELUAR"){
			$whereCek = "nomor='$nomor' && jenissurat='KELUAR'";
			$jmlCek = $this->arsipModel->getSuratWhere($whereCek)->num_rows();
		}

		if($jmlCek>0 && $nomor!=$nomor_lama){
			echo json_encode(array("Edit Gagal, Nomor surat duplikat", ""));
		}else{

			$nomorfix = $this->charReplace($nomor);
			if(empty($file_name)){
				if(empty($file_lama)){
					$file = "";
				}else{
					$file_lama_ext = explode(".", $file_lama)[1];
					if($jenissurat=="MASUK"){
						$file = $nomorfix."-".$no_agenda.$tahun.".".$file_lama_ext;
					}elseif ($jenissurat=="KELUAR") {
						$file = $nomorfix.".".$file_lama_ext;
					}

					if(file_exists('./upload/'.$file_lama)){
						rename("./upload/".$file_lama, "./upload/".$file);
					}

				}
			}else{
				if(!empty($file_lama)){
					if(file_exists('./upload/'.$file_lama)){
						unlink("./upload/".$file_lama);
					}
				}
				$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
				if($jenissurat=="MASUK"){
					$file = $nomorfix."-".$no_agenda.$tahun.".".$file_ext;
				}elseif ($jenissurat=="KELUAR") {
					$file = $nomorfix.".".$file_ext;
				}
			}
			// echo $file;

			$oleh = $this->session->username;
			$pada = date("Y-m-d H:i:s");

			$data = array(
				"nomor" => $nomor,
				"tglditerima" =>  $jenissurat=="MASUK"? date("Y-m-d", strtotime($tglditerima)): "",
				"tglsurat" => date("Y-m-d", strtotime($tglsurat)),
				"perihal" => $perihal,
				"pengirim" => $pengirim,
				"penerima" => $penerima,
				"disposisi" => $disposisi,
				"file" => $file,

				"updated_by" 	=> $oleh,
				"updated_on" 	=> $pada
			);
			
			$this->arsipModel->updSurat($data, $id);
			if(!empty($file_name)){
				$this->aksi_upload($file);
			}

			// Update arsip
			$data_update_arsip = array(
				"updated_by" 	=> $oleh,
				"updated_on" 	=> $pada
			);
			$this->arsipModel->upd($data_update_arsip, $arsip_id);
			// Update arsip

			// add to activity
			$ketActivity = "Merubah Surat ".(!empty($no_agenda)? $no_agenda." - ": "").$nomor;
			$dataActivity = array(
				"keterangan" 	=> $ketActivity,
				"created_by" 	=> $oleh,
				"created_on" 	=> $pada
			);
			$this->activityModel->ins($dataActivity);

			echo json_encode(array("Edit Berhasil", ""));
		}
	}

	function hapusSurat($id){
		$id = base64_decode($id);
		$where = "surat.surat_id='$id'";
		$data['surat'] = $this->arsipModel->getSuratWhere($where)->result();
		$this->load->view('arsip/ajax/surat/hapus',$data);
	}

	function hapusSuratAksi(){
		$id = $this->input->post("surat_id");
		$file = $this->input->post("file");
		$nomor = $this->input->post("nomor");
		$no_agenda = $this->input->post("no_agenda");

		$oleh = $this->session->username;
		$pada = date("Y-m-d H:i:s");
		
		$this->arsipModel->delSurat($id);

		if(!empty($file)){
			if(file_exists('./upload/'.$file)){
				unlink("./upload/".$file);
			}
		}

		// add to activity
		$ketActivity = "Menghapus Surat ".(!empty($no_agenda)? $no_agenda." - ": "").$nomor;
		$dataActivity = array(
			"keterangan" 	=> $ketActivity,
			"created_by" 	=> $oleh,
			"created_on" 	=> $pada
		);
		$this->activityModel->ins($dataActivity);

		echo json_encode(array("Hapus Berhasil", ""));
	}

	function aksi_upload($file_name){
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = '*';
		$config['max_size'] = 0; // unlimited
		// $config['max_size'] = 128; // limited
		$config['file_name'] = $file_name;
		// $config['encrypt_name'] = TRUE;
		// $config['overwrite'] = FALSE;
		// $config['max_width'] = 1024;
		// $config['max_height'] = 768;
 
		$this->load->library('upload', $config);
 
		if ( !$this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			// print_r($error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			// print_r($data);
		}
	}
 
	function downloadSurat($file){
		$file = base64_decode($file);			
		// force_download('upload/'.$file, NULL);
		if(file_exists('./upload/'.$file)){
			redirect(base_url('upload/'.$file));
		}else{
			echo "<center>*** file tidak ditemukan ***</center>";
		}
	}

	function charReplace($char){
		return str_replace(array(' ', '/', '.', '(', ')'), '-', $char);
	}

}