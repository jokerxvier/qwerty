<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant extends CI_Controller {
	
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
		$data['main_content'] = 'pages/merchant_view';
		$data['page'] = "merchant"; 
		$data['username'] = $this->session->userdata('username') ;
		$data['isLogin'] = true;
		
		$config = array();
        $config["base_url"] = base_url() . "merchant/index";
        $config["total_rows"] = $this->merchant_model->record_count();
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
		
		
 
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->merchant_model->fetch_merchant($config["per_page"], $page);
        $data["resultCount"] =  count($data["results"]);
		if (!is_null($message)){
			$data['message'] = $message;	
		}
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
	
	public function process(){

			$response = array();
			$date = date('Y-m-d H:i:s');
			$action = (isset($_GET['action'])) ? $_GET['action'] : '';
			$mechant_name = (isset($_GET['merchant_name'])) ? $this->security->xss_clean($_GET['merchant_name']) : ''  ;
			$address = (isset($_GET['address'])) ? $this->security->xss_clean($_GET['address']) : ''  ;
			$phone = (isset($_GET['phone'])) ? $this->security->xss_clean($_GET['phone']) : ''  ;
			$city = (isset($_GET['city'])) ? $this->security->xss_clean($_GET['city']) : '' ; 
			$email = (isset($_GET['email'])) ? $this->security->xss_clean($_GET['email']) : ''  ;
			
		switch ($action){
			case "insert_merchant":	
				$data = array(
				   'merchant_name' => $mechant_name,
				   'merchant_address' => $address,
				   'contact_number' => $phone ,
				   'contact_person' => $city ,
				   'email' => $email,
				   'date_inserted' =>  $date,
				);
				$response['merchant'] = array();
				array_push($response["merchant"], $data);
	
				$this->db->insert('merchant', $data);
				$response["success"] = 1;
				echo json_encode($response);
			break;
			
			case "delete":
				$merchant_ids = (isset($_GET['item'])) ? $_GET['item'] : '';
				foreach ($merchant_ids as $key=>$val){
					$this->db->where('merchant_id', $val);
					$this->db->delete('merchant');
				}
				$message = "You have successfully Deleted an Item";
				
				return $this->index($message);
			break;
			
			
			
		}
			
			
	}
	
	private function check_validated(){
		 if(!$this->session->userdata('isLogin')){
			redirect('login');
		 }
	}
	
	
}

