<?php 

class ArsipModel extends CI_Model{

	function getAll(){
		$hasil = $this->db->get('arsip');
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

}