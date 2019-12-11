<?php 

class ArsipModel extends CI_Model{

	function getAll(){
		$hasil = $this->db->select('a.*, (SELECT count(b.arsip_id) FROM surat b WHERE b.arsip_id=a.arsip_id) jml_surat');
		$hasil = $this->db->from('arsip a');
		$hasil = $this->db->get();
		return $hasil;
	}

	function get($id){
		$this->db->where("arsip_id", $id);
		$hasil = $this->db->get("arsip");
		return $hasil;
	}

	function getWhere($where){
		$this->db->where($where);
		$hasil = $this->db->get("arsip");
		return $hasil;
	}

	function ins($data){
		$this->db->insert("arsip", $data);
	}

	function upd($data, $id){
		$this->db->where("arsip_id", $id);
		$this->db->update("arsip", $data);
		// echo $this->db->last_query();
	}

	function del($id){
		$this->db->where("arsip_id", $id);
		$this->db->delete("arsip");
	}

	function getSuratWhere($where){
		$hasil = $this->db->select("surat.*, no_agenda.no_agenda, no_agenda.tahun");
		$hasil = $this->db->from("surat");
		$hasil = $this->db->join("no_agenda", "no_agenda.surat_id=surat.surat_id", "left");
		$hasil = $this->db->where($where);
		$hasil = $this->db->get();
		return $hasil;
	}

	function insSurat($data){
		$this->db->insert("surat", $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	function insNoAgenda($data){
		$this->db->insert("no_agenda", $data);
	}

	function updSurat($data, $id){
		$this->db->where("surat_id", $id);
		$this->db->update("surat", $data);
		// echo $this->db->last_query();
	}

	function delSurat($id){
		$this->db->where("surat_id", $id);
		$this->db->delete("surat");
	}

	function getNoAgenda(){
		$hasil = $this->db->select("MAX(no_agenda) max_no_agenda, tahun");
		$hasil = $this->db->from("no_agenda");
		$hasil = $this->db->group_by("tahun");
		$hasil = $this->db->order_by("tahun", "DESC");
		$hasil = $this->db->limit(1);
		$hasil = $this->db->get();
		// echo $this->db->last_query();
		return $hasil;
	}

}