<?php

class Site_model exttennds CI_Model{

	function __construct(){
		parent::__construct();	
	}
	
	
	public function validate(){
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xsss_clean($this->input->post('password'));
	}
		
}

?>