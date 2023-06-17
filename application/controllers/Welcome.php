<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
		//error_reporting(0);
		$this->load->library('pagination');
		$this->load->model('Viewmodel');
		//$this->load->model('Web_option');
		$this->load->database();
    }
	public $web_title = "Reccsar Pvt Ltd";
	public function index()
	{
		$data['title'] = "Home - ".$this->web_title;
		$this->load->view('index/index', $data);
	}
	public function about()
	{
		$data['title'] = "About - ".$this->web_title;
		$this->load->view('pages/about', $data);
	}
	public function services()
	{
		$data['title'] = "Services - ".$this->web_title;
		$data['services'] = $this->Viewmodel->services_role2();
		$this->load->view('pages/services', $data);
	}
	public function contact()
	{
		$data['title'] = "Contact - ".$this->web_title;
		$this->load->view('pages/contact', $data);
	}
	public function courses($id)
	{
		$config = array();
        $config["base_url"] = base_url() . 'courses/'.$id.'/';
        $config["total_rows"] = $this->Viewmodel->training_count_data($id);
        $config["per_page"] = 9;
        $config["uri_segment"] = 3;
		$config['reuse_query_string'] = true;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$str_links = $this->pagination->create_links();
		$data['links'] = explode('&nbsp;',$str_links );
		$data['training'] = $this->Viewmodel->training($id, $config["per_page"], $page);
		$data['training_title'] = $this->Viewmodel->training_title($id);
		$data['title'] = $data['training_title']['r_training_category'].' Courses - '.$this->web_title;
		$data["course_count"] = $this->Viewmodel->training_count_data($id);
		$this->load->view('courses/courses', $data);
	}
	public function coursesdetail($tcs,$trs)
	{
		$data['ts'] = $this->Viewmodel->training_single($tcs,$trs);
		if(empty($data['ts'])){
			$data['title'] = 'No Data Found';
			$this->load->view('404/404', $data);
		} else if($trs != $data['ts']['r_course_short'] || $tcs != $data['ts']['r_training_short']){
			$data['title'] = 'No Data Found';
			$this->load->view('404/404', $data);
		} else {
			$data['training_random'] = $this->Viewmodel->training_random($data['ts']['r_category_id']);
			$data['title'] = $data['ts']['r_course_name'].' - '.$this->web_title;
			$this->load->view('courses/courses_details', $data);
		}
	}
	public function certificate()
	{
		$data['title'] = "Certificate - ".$this->web_title;
		$this->load->view('certificate/certificate', $data);
	}
}