<?php 

class JadwalModel extends CI_Model{

	function getAll(){
		$this->db->select('jadwal_h.*, user.nama');
		$this->db->from('jadwal_h');
		$this->db->join('user', 'user.id=jadwal_h.id_pj');
		$hasil = $this->db->get();
		return $hasil;
	}

	function getPerIdUser($id){
		$this->db->select('jadwal_h.*, user.nama');
		$this->db->from('jadwal_h');
		$this->db->join('user', 'user.id=jadwal_h.id_pj');
		$this->db->where('id_pj', $id);
		$hasil = $this->db->get();
		return $hasil;
	}

	function get($id){
		$this->db->where("id", $id);
		$hasil = $this->db->get("jadwal_h");
		return $hasil;
	}

	function ins($data){
		$this->db->insert("jadwal_h", $data);
		$last_id = $this->db->insert_id();
		return $last_id;
	}

	function upd($data, $id){
		$this->db->where("id", $id);
		$this->db->update("jadwal_h", $data);
	}

	function del($id){
		$this->db->where("id", $id);
		$this->db->delete("jadwal_h");
	}

}