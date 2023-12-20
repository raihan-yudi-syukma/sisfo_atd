<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['akademik/auth_model', 'akademik/feedback_model']);
		if (!$this->auth_model->current_user())
			redirect('auth/login');
	}

	public function index()
	{
		$data['feedbacks'] = $this->feedback_model->get();
		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Feedback'];

		$this->load->view(count($data['feedbacks']) > 0 ? 
			'admin/akademik/feedback/feedback_list' :
			'admin/akademik/feedback/feedback_empty', $data
		);
	}

	public function delete($id = null) 
	{
		if (!$id) 
			redirect('errors/page_not_found');

		if ($this->feedback_model->delete($id)) {
			$this->session->set_flashdata('feedback_deleted', 'Feedback deleted!');
			redirect('admin/akademik/feedback');
		} else {
			redirect('errors/something_wrong');
		}
	}

	public function truncate()
	{
		if ($this->feedback_model->truncate()) {
			$this->session->set_flashdata('feedback_truncated', 'All feedbacks deleted!');
			redirect('admin/akademik/feedback');
		} else {
			redirect('errors/something_wrong');
		}
	}
}