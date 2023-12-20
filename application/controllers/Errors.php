<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller 
{

	public function __construct() {
		parent::__construct();
		$this->load->model('akademik/auth_model');
	}

	public function page_not_found()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => '404'];
		$this->load->view('errors/page_not_found', $data);
	}

	public function something_wrong() 
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Error Occured!'];
		$this->load->view('errors/something_wrong', $data);
	}
	
}