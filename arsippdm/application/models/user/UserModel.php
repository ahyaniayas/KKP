<?php 

class UserModel extends CI_Model{

	function getAll(){
		$hasil = $this->db->get("user");
		return $hasil;
	}

	function get($id){
		$this->db->where("user_id", $id);
		$hasil = $this->db->get("user");
		// echo $this->db->last_query();
		return $hasil;
	}

	function getWhere($where){
		$this->db->where($where);
		$hasil = $this->db->get("user");
		return $hasil;
	}

	function ins($data){
		$this->db->insert("user", $data);
		// $last_id = $this->db->insert_id();
		// return $last_id;
	}

	function upd($data, $id){
		$this->db->where("user_id", $id);
		$this->db->update("user", $data);
	}

	function del($id){
		$this->db->where("user_id", $id);
		$this->db->delete("user");
	}

}