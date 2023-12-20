<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('akademik/auth_model');
	}

	// menampilkan error 404
	public function index() 
	{
		redirect('errors/page_not_found');
	}

	// funtion untuk menampilkan dan melakukan validasi form login
	public function login() 
	{
		$this->load->library('form_validation');

		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Login'];

		// menyiapkan form validation
		$this->form_validation->set_rules($this->auth_model->rules());
		if ($this->form_validation->run() == TRUE) {

			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);
			if ($this->auth_model->login($username, $password)) {
				redirect('admin/dashboard');
			} else {
				$this->session->set_flashdata('login_failed', 
					'Login Gagal, pastikan username dan password benar!');
			}
		} 
		$this->load->view('login', $data);
	}

	// function untuk mengakhiri sesi
	public function logout() 
	{
		$this->auth_model->logout();
		redirect('auth/login');
	}
}