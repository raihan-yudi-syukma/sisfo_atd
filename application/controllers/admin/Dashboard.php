<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		// memuat file model
		$this->load->model([
			'akademik/auth_model', 
			'akademik/mahasiswa_model', 
			'akademik/article_model', 
			'akademik/feedback_model'
		]);

		// apakah ada session/login?
		$data['current_user'] = $this->auth_model->current_user();
		if (!$data['current_user'])
			redirect('auth/login');

		// count mahasiswa
		$data['mahasiswa_count'] = [
			'mi_count' => $this->mahasiswa_model->count('Manajemen Informatika'),
			'si_count' => $this->mahasiswa_model->count('Sistem Informasi'),
			'tk_count' => $this->mahasiswa_model->count('Teknik Komputer')
		];

		// count article
		$data['article_count'] = [
			'draft_count' => $this->article_model->count('draft'),
			'published_count' => $this->article_model->count('published')
		];

		// count feedback
		$data['feedback_count'] = $this->feedback_model->count();

		$data['meta'] = ['title' => 'Dashboard'];
		$this->load->view('admin/dashboard', $data);
	}
}