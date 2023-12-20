<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['akademik/auth_model', 'akademik/article_model']);
	}

	public function index() 
	{
		$data['current_user'] = $this->auth_model->current_user();
		
		// memuat article dari model
		$data['articles'] = $this->article_model->get_published();
		$data['meta'] = ['title' => 'List Artikel'];
		$this->load->view(
			count($data['articles']) > 0 ? 
				'article/article_list' :
				'article/article_empty', $data
		);
	}

	// function untuk mendapatkan article sesuai slug (setelah slash nama domain)
	public function show($slug = null)
	{
		if (!$slug) redirect('errors/page_not_found');

		$data['article'] = $this->article_model->find_by_slug($slug);
		if(!$data['article']) redirect('errors/page_not_found');

		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Baca Artikel'];
		$this->load->view('article/article_show', $data);
	}
}	