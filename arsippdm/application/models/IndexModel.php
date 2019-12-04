<?php 

class IndexModel extends CI_Model{

	function getArsipLimit($limit){
		$hasil = $this->db->select('a.*, (SELECT count(b.arsip_id) FROM surat b WHERE b.arsip_id=a.arsip_id) jml_surat');
		$hasil = $this->db->from('arsip a');
		$hasil = $this->db->limit($limit);
		$hasil = $this->db->order_by('created_on', 'desc');
		$hasil = $this->db->get();
		return $hasil;
	}

}