<?php 

class LoginModel extends CI_Model{

	function get($data){
		$this->db->where($data);
		$hasil = $this->db->get("user");
		return $hasil;
	}

}