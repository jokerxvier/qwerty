<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->check_validated();
		$this->load->model('merchant_model');
		$this->load->library("pagination");
		$this->load->helper("url");
    }

	public function index()
	{
		$data['main_content'] = 'pages/merchant_view';
		$data['page'] = "merchant"; 
		$data['username'] = $this->session->userdata('username') ;
		$data['isLogin'] = true;
		
		$config = array();
        $config["base_url"] = base_url() . "merchant";
        $config["total_rows"] = $this->merchant_model->record_count();
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;
		
 
        $this->pagination->initialize($config);
		 $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->merchant_model->
            fetch_merchant($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		
		$this->load->view('template', $data);
	}
	
	
	public function add(){
		$data['main_content'] = 'pages/merchant_add_view';
		$data['page'] = "addmerchant"; 
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

