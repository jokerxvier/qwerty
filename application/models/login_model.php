<?php

class Login_model extends CI_Model{

	function __construct(){
		parent::__construct();	
	}
	
	
	public function validate(){
		$username =  $this->security->xss_clean($this->input->post('username'));
		$password =  $this->security->xss_clean($this->input->post('password'));
		
		$this->db->where('username', $username);
        $this->db->where('password', md5($password));
		
		$query = $this->db->get('users');
		if($query->num_rows == 1)
        {

            $row = $query->row();
            $data = array(
                    'user_id' => $row->user_id,
                    'fname' => $row->fname,
                    'lname' => $row->lname,
                    'username' => $row->username,
                    'isLogin' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        return false;
	}
		
}

?>