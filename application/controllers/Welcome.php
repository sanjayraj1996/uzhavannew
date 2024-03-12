<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
		//error_reporting(0);
		$this->load->library('pagination');
		$this->load->model('Viewmodel');
        $this->load->model('Website_model');
		//$this->load->model('Web_option');
		$this->load->database();
    }
	public $web_title = "UZHAVAN";
	public function index()
	{
		$data['title'] = "Home - ".$this->web_title;
		$this->load->view('index/index', $data);
	}
	public function aboutus()
	{
		$data['title'] = "About - ".$this->web_title;
		$this->load->view('pages/aboutus', $data);
	}
	public function services()
	{
		$data["services"] = $this->Viewmodel->services_data();
		$data['title'] = "Services - ".$this->web_title;
		$this->load->view('pages/services', $data);
	}
	public function contactus()
	{
		$data['title'] = "Contact - ".$this->web_title;
		$this->load->view('pages/contact', $data);
	}
    public function signup()
	{
		$data['title'] = "Login - ".$this->web_title;
		$this->load->view('auth/signup', $data);
	}
}