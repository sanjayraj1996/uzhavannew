<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
		//$this->load->model('web_option');
		//$this->load->database();
    }
	public $web_title = "Reccsar Pvt Ltd";
	public function index()
	{
		$data['title'] = '404 - '.$this->web_title;
		$this->output->set_status_header('404');
		$this->load->view('404/404', $data);
	}
}
