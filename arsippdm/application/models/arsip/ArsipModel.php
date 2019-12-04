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
		$hasil = $this->db->where($where);
		$hasil = $this->db->get('surat');
		return $hasil;
	}

	function insSurat($data){
		$this->db->insert("surat", $data);
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

}