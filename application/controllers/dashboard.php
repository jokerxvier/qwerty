<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['main_content'] = 'pages/dashboard_view';
		$this->load->view('template', $data);
	}
	
	
}

