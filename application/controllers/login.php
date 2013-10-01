<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index($msg = NULL)
	{
		$data['main_content'] = 'pages/login_view';
		$data['alerts'] = $msg;
		$data['page'] = 'login';
		$this->load->view('template', $data);
	}
	
	
	public function process(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('login_model');
		
		$this->form_validation->set_rules('username', 'Password', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() == FALSE)
		{
			$msg = "Username and Password is required";
			$this->index($msg);	
		}else {
			$result = $this->login_model->validate();
			if(!$result){
				$msg = "Wrong Username and Password";
				$this->index($msg);
			}else {
				echo "success";	
			}
		}
	}
	
	
}

