<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->check_validated();
		$this->load->model('merchant_model');
		$this->load->library("pagination");
		$this->load->helper("url");
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
    }

	public function index($message = NULL)
	{
		$data['main_content'] = 'pages/location_view';
		$data['page'] = "location"; 
		$data['js'] = "assets/js/location.js"; 
		$data['username'] = $this->session->userdata('username') ;
		$data['isLogin'] = true;
		
		
		
		$this->load->view('template', $data);
	}
	
	
	public function process(){
		$action = (isset($_GET['action'])) ? $_GET['action'] : '';
		$loc_name = (isset($_GET['loc_name'])) ? $_GET['loc_name'] : '';
		$house = (isset($_GET['house'])) ? $_GET['house'] : '';
		$street = (isset($_GET['street'])) ? $_GET['street'] : '';
		$brgy = (isset($_GET['brgy'])) ? $_GET['brgy'] : '';
		$postal = (isset($_GET['postal'])) ? $_GET['postal'] : '';
		$lat = (isset($_GET['lat'])) ? $_GET['lat'] : '';
		$lng = (isset($_GET['lng'])) ? $_GET['lng'] : '';
		
		
		switch($action){
			case "add":
			
			echo json_encode('success');
			
			break;
		}
		
	}
	
	
	
	private function check_validated(){
		 if(!$this->session->userdata('isLogin')){
			redirect('login');
		 }
	}
	
	
}

