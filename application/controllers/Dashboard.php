<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
		error_reporting(0);
		$this->load->model('Viewmodel');
		$this->load->model('User');
		$this->load->database();
		if((!isset($this->session->userdata['logged_in'])) && (!isset($this->session->userdata['id'])) && (!isset($this->session->userdata['username'])) && ($this->router->fetch_method() != 'login')){
			redirect('dashboard/login');
		}
    }
	public $web_title = "UZHAVAN";
    public function index()
	{	
		$data['title'] = 'Dashboard - '.$this->web_title;
		$this->load->view('dashboard/index', $data);
	}
	public function login()
	{
		if (isset($this->session->userdata['logged_in'])) {
			header("location: ". base_url(''). "dashboard/index");
		}
        if($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')) {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
                $data['checkLogin'] = $this->User->getdata($username,$password);
				$email = $data['checkLogin']['email'];
				$id = $data['checkLogin']['id'];
                if($data['checkLogin']) {
					$sesdata = array(
						'id' => $id,
						'username'  => $username,
						'email'     => $email,
						'logged_in' => TRUE
					);
					$this->session->set_userdata($sesdata);
					redirect('dashboard/');
                } else {
                    $data['error_msg'] = 'Invalid Username or Password';
                }
            }
        }
		$data['page_title'] = 'Login - '.$this->web_title;
        $this->load->view('auth/login', $data);
	}
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$data['message_display'] = 'Successfully Logout';
		$data['page_title'] = 'Login - '.$this->web_title;
		$this->load->view('auth/login', $data);
	}
}