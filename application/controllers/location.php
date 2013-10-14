<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->check_validated();
		$this->load->model('location_model');
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
		$data['js'] = base_url()."assets/js/location.js";
		$data['username'] = $this->session->userdata('username') ;
		$data['isLogin'] = true;
		
		$config = array();
        $config["base_url"] = base_url() . "location/index";
        $config["total_rows"] = $this->location_model->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
    	$config["num_links"] = round($choice);

		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';
		
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		
		$config['anchor_class'] = 'follow_link ';
		
		
 		$data['category'] =  $this->location_model->get_records('loc_category');
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->location_model->fetch_merchant($config["per_page"], $page);
        $data["resultCount"] =  $this->location_model->record_count();
		if (!is_null($message)){
			$data['message'] = $message;	
		}
		$data["links"] = $this->pagination->create_links();
		
		$this->load->view('template', $data);
	}
	
	
	public function process(){
		$action = (isset($_GET['action'])) ? $_GET['action'] : '';
		$loc_name = (isset($_GET['loc_name'])) ? $_GET['loc_name'] : '';
		$house = (isset($_GET['house'])) ? $_GET['house'] : '';
		$street = (isset($_GET['street'])) ? $_GET['street'] : '';
		$brgy = (isset($_GET['brgy'])) ? $_GET['brgy'] : '';
		$postal = (isset($_GET['postal'])) ? $_GET['postal'] : '';
		$cat = (isset($_GET['cat'])) ? $_GET['cat'] : '';
		$lat = (isset($_GET['lat'])) ? $_GET['lat'] : '';
		$lng = (isset($_GET['lng'])) ? $_GET['lng'] : '';
		$date = date('Y-m-d H:i:s');
		
		
		switch($action){
			case "add":
			$response = array();
			$data = array(
					   array(
						  'Title' => $loc_name ,
						  'description' => '',
						  'lat' => $lat,
						  'long' => $lng,
						  'house_number' => $house ,
						  'street_name' => $street,
						  'barangay' => $brgy ,
						  'postal_code' => $postal,
						  'cat_id' => $cat,
						  'created_at' => $date,
					   )
  			 );

			$this->db->insert_batch('location', $data); 
			$response["success"] = 1;
			echo json_encode($response);

			
			break;
			
			case "icon" : 
				

				$icon = (isset($_GET['icon'])) ? $_GET['icon'] : '';
				$cat_id = (isset($_GET['cat_id'])) ? $_GET['cat_id'] : '';
				$cat = $this->location_model->get_recordsById($cat_id, 'loc_category');
				$response["icon"] = array();
				array_push($response["icon"], $cat[0]->icon);
				$response["success"] = 1;	
				
				echo json_encode($response);
			
			break;
			
		}
		
	}
	
	
	
	private function check_validated(){
		 if(!$this->session->userdata('isLogin')){
			redirect('login');
		 }
	}
	
	
}

