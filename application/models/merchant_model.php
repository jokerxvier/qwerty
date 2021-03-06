<?php

class Merchant_model extends CI_Model{

	function __construct(){
		parent::__construct();	
		
	}
	
	
	public function record_count(){
		return $this->db->count_all("merchant");
	}
	
	public function fetch_merchant($limit, $start){
		$this->db->order_by("date_inserted", "desc"); 
		$this->db->limit($limit, $start);
		$query = $this->db->get("merchant");
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		
		return false;
	}
	
	public function displayData($id){
		$this->db->where('merchant_id',$id);
		$query = $this->db->get("merchant");
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		
		return false;
	}
	
	public function insertData($data){
		$insert =  $this->db->insert('merchant', $data);
		return $insert;
	
	}
	
	
	
	
	
		
}

?>