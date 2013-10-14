<?php

class Location_model extends CI_Model{
	function __construct(){
		parent::__construct();	
		
	}
	
	public function record_count(){
		return $this->db->count_all("location");
	}
	
	public function fetch_merchant($limit, $start){
		$this->db->order_by("location.created_at", "desc"); 
		$this->db->limit($limit, $start);
		$this->db->select('locate.*, loc_category.icon, loc_category.cat_name');
		$this->db->from('location AS locate');
		$this->db->join('loc_category', 'locate.cat_id = loc_category.id', 'left');
		
		
		$query = $this->db->get("location");
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		
		return false;
	}
	
	
	function get_records($db){
		$query = $this->db->get($db);
		return $query->result();
	}
	
	function get_recordsById($id, $db){
		$this->db->where('id', $id);
		$query = $this->db->get($db);
		return $query->result();
	}
	
	
	function add_record($data)
	{
		$this->db->insert('data', $data);
		return;
	}
		
}

?>