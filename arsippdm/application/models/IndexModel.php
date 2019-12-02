<?php 

class IndexModel extends CI_Model{

	function getH($id_pj){
		$this->db->select('jh.deskripsi, jh.iuran, jh.link, (SELECT count(id) FROM jadwal_d WHERE id_jadwal=jh.id) jml_nama');
		$this->db->from('jadwal_h jh');
		$this->db->where("id_pj", $id_pj);
		$this->db->where("status", "1");
		$this->db->order_by("jh.tanggal", "DESC");
		$hasil = $this->db->get();
		return $hasil;
	}

}