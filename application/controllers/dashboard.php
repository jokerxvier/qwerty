<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->check_validated();
    }

	public function index()
	{
		$data['main_content'] = 'pages/dashboard_view';
		$data['page'] = "dashboard"; 
		$data['username'] = $this->session->userdata('username') ;
		$data['isLogin'] = true;
		$this->load->view('template', $data);
	}
	
	private function check_validated(){
		 if(! $this->session->userdata('isLogin')){
			redirect('login');
		 }
	}
	
	
}

