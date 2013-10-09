<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotion extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->check_validated();
		$this->load->library("pagination");
		$this->load->helper("url");
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
    }

	public function index($message = NULL)
	{
		$data['main_content'] = 'pages/promotion_view';
		$data['page'] = "promotion"; 
		$data['username'] = $this->session->userdata('username') ;
		$data['isLogin'] = true;

		$this->load->view('template', $data);
	}
	
	private function check_validated(){
		 if(!$this->session->userdata('isLogin')){
			redirect('login');
		 }
	}
	
	
}

