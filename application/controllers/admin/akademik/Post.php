<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['akademik/auth_model', 'akademik/article_model']);
		// apakah ada admin login?
		if (!$this->auth_model->current_user())
			redirect('auth/login');
	}

	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();

		$data['articles'] = $this->article_model->get();
		$data['meta'] = ['title' => 'Posts'];
		$this->load->view(count($data['articles']) <= 0 ?
			'admin/akademik/post/post_empty' :
			'admin/akademik/post/post_list.php', $data
		);
	}

	public function add()
	{
		$this->load->library('form_validation');
		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Posts'];
		
		$this->form_validation->set_rules($this->article_model->rules('add'));
		if ($this->form_validation->run() === TRUE) {
			// generate unique id and slug
			$id = uniqid('', true);
			$slug = url_title($this->input->post('title'), 'dash', TRUE).'-'.$id;

			$article = [
				'id' => $id,
				'title' => $this->input->post('title', true),
				'slug' => $slug,
				'content' => $this->input->post('content', true),
				'draft' => $this->input->post('draft', true)
			];

			if ($this->article_model->insert($article)) {
				$this->session->set_flashdata('post_saved', 'Artikel disimpan!');
				return redirect('admin/akademik/post');
			} else {
				redirect('errors/something_wrong');
			}
		}
		$this->load->view('admin/akademik/post/post_add', $data);
	}

	public function edit($id = null) 
	{
		$data['article'] = $this->article_model->find($id);
		if(!$data['article'] || !$id) 
			return redirect('errors/page_not_found');

		$this->load->library('form_validation');
		
		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Posts'];
		$this->form_validation->set_rules($this->article_model->rules('edit'));
		if ($this->form_validation->run() === TRUE) {
			$article = [
				'id' => $id,
				'title' => $this->input->post('title', true),
				'content' => $this->input->post('content', true),
				'draft' => $this->input->post('draft', true)
			];

			$updated = $this->article_model->update($article);
			if($updated === 'success') {
				$this->session->set_flashdata('post_updated', 'Artikel di-update!');
				redirect('admin/akademik/post');
			} 
			elseif ($updated === 'title_duplicated') {
				$this->session->set_flashdata('title_duplicated', 'Judul ini sudah terpakai!');
			} else {
				redirect('errors/something_wrong');
			}
		}
		$this->load->view('admin/akademik/post/post_edit', $data);
	}

	public function delete($id = null)
	{
		if(!$id) redirect('errors/page_not_found');

		if ($this->article_model->delete($id)) {
			$this->session->set_flashdata('post_deleted', 'Artikel dihapus!');
			redirect('admin/akademik/post');
		} else {
			redirect('errors/something_wrong');
		}
	}

	public function truncate()
	{
		if ($this->article_model->truncate()) {
			$this->session->set_flashdata('post_truncated', 'Semua artikel dihapus!');
			redirect('admin/akademik/post');
		} else {
			redirect('errors/something_wrong');
		}
	}
}
