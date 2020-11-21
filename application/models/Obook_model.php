<?php 

class Obook_model extends CI_Model{
	function data($number,$offset){
		return $query = $this->db->order_by("tanggal", "desc")->order_by("id", "desc")->get('buku',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		return $this->db->get('buku')->num_rows();
	}
}