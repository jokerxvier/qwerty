<?php

class Site_model exttennds CI_Model{

	function get_records(){
		$query = $this->db->get('');
		return $query->result();
	}
	
	
	function add_record($data)
	{
		$this->db->insert('data', $data);
		return;
	}
		
}

?>