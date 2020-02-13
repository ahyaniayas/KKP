<?php 

class ActivityModel extends CI_Model{

	function getAll(){
		$hasil = $this->db->get("activity");
		return $hasil;
	}

	function get($id){
		$this->db->where("activity_id", $id);
		$hasil = $this->db->get("activity");
		// echo $this->db->last_query();
		return $hasil;
	}

	function getWhere($where){
		$hasil = $this->db->where($where);
		$hasil = $this->db->order_by("created_on", "DESC");
		$hasil = $this->db->get("activity");
		// echo $this->db->last_query();
		return $hasil;
	}

	function ins($data){
		$this->db->insert("activity", $data);
		// $last_id = $this->db->insert_id();
		// return $last_id;
	}

	function upd($data, $id){
		$this->db->where("activity_id", $id);
		$this->db->update("activity", $data);
	}

	function del($id){
		$this->db->where("activity_id", $id);
		$this->db->delete("activity");
	}

}