<?php 

class JadwalDetailModel extends CI_Model{

	function getH($link){
		$this->db->select('jadwal_h.*, user.nama, user.kontak');
		$this->db->from('jadwal_h');
		$this->db->join('user', 'user.id=jadwal_h.id_pj');
		$this->db->where("link", $link);
		$hasil = $this->db->get();
		return $hasil;
	}

	function getIuranTerkumpul($id){
		$this->db->select('SUM(bayar) terkumpul');
		$this->db->from('jadwal_d');
		$this->db->where("id_jadwal", $id);
		$hasil = $this->db->get();
		return $hasil;
	}

	function getAll($idH){
		$this->db->select('*');
		$this->db->from('jadwal_d');
		$this->db->where("id_jadwal", $idH);
		$hasil = $this->db->get();
		return $hasil;
	}

	function getIdPj($idH){
		$this->db->select('id_pj');
		$this->db->from('jadwal_h');
		$this->db->where("id", $idH);
		$hasil = $this->db->get();
		return $hasil;
	}

	function get($id){
		$this->db->where("id", $id);
		$hasil = $this->db->get("jadwal_d");
		return $hasil;
	}

	function ins($data){
		$this->db->insert("jadwal_d", $data);
		$last_id = $this->db->insert_id();
		return $last_id;
	}

	function upd($data, $id){
		$this->db->where("id", $id);
		$this->db->update("jadwal_d", $data);
	}

	function del($id){
		$this->db->where("id", $id);
		$this->db->delete("jadwal_d");
	}

}