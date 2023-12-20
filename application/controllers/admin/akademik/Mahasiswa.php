<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller 
{
	// function yang pertama kali dijalankan
	public function __construct() 
	{
		parent:: __construct();
		$this->load->model(['akademik/auth_model', 'akademik/mahasiswa_model']);
		// apakah ada admin login?
		if (!$this->auth_model->current_user())
			redirect('auth/login');

		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	// function untuk menampilkan data
	public function index() 
	{
		// konfigurasi pagination
		$this->load->library('pagination');
		$paging = [
			'base_url' => site_url('admin/akademik/mahasiswa'),
			'page_query_string' => TRUE,
			'total_rows' => $this->mahasiswa_model->count(),
			'per_page' => 5,
			'full_tag_open' => '<div class="pagination">',
			'full_tag_close' => '</div>'
		];
		$this->pagination->initialize($paging);

		// rentang dan batasan mendapatkan data
		$limit = $paging['per_page'];
		$offset = html_escape($this->input->get('per_page'));

		// mendapatkan data user yang sedang login
		$data['current_user'] = $this->auth_model->current_user();

		// mendapatkan data mahasiswa
		$data['mahasiswa'] = $this->mahasiswa_model->get($limit, $offset);
		$data['keyword'] = trim($this->input->get('keyword'));
		$data['kelamin'] = $this->input->get('kelamin');
		$data['program_studi'] = $this->input->get('program_studi');

		// pengaturan judul dan item pada view
		$data['meta'] = ['title' => 'Mahasiswa'];
		$data['kelaminx'] = ['Laki-laki', 'Perempuan'];
		$data['program_studix'] = [
			'Manajemen Informatika', 
			'Sistem Informasi', 
			'Teknik Komputer'
		];

		if (!empty($data['keyword']) || 
			!empty($data['kelamin']) || 
			!empty($data['program_studi'])) {
			$data['mahasiswa'] = $this->mahasiswa_model->search($data['keyword'], $data['kelamin'], $data['program_studi']);
		}

		$this->load->view(count($data['mahasiswa']) <= 0 ?
			'admin/akademik/mahasiswa/mahasiswa_empty' :
			'admin/akademik/mahasiswa/mahasiswa_list', $data
		);
	}

	// function untuk melakukan proses tambah data
	public function add() 
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Mahasiswa'];
		$data['program_studi'] = [
			'Manajemen Informatika', 
			'Sistem Informasi', 
			'Teknik Komputer'
		];

		$this->form_validation->set_rules($this->mahasiswa_model->rules('add'));
		if ($this->form_validation->run() === TRUE) {
			// data yang akan di input
			$mahasiswa = [
				'nim' => $this->input->post('nim', true),
				'nama' => $this->input->post('nama', true),
				'tpt_lahir' => $this->input->post('tpt_lahir', true),
				'tgl_lahir' => $this->input->post('tgl_lahir', true),
				'kelamin' => $this->input->post('kelamin', true),
				'alamat' => $this->input->post('alamat', true),
				'no_telepon' => $this->input->post('no_telepon', true),
				'program_studi' => $this->input->post('program_studi', true)
			];

			if ($this->mahasiswa_model->insert($mahasiswa);) { 
				$this->session->set_flashdata('mahasiswa_saved', 'Data disimpan!');
			} else {
				redirect('errors/something_wrong');
			}
		}
		$this->load->view('admin/akademik/mahasiswa/mahasiswa_add', $data);
	}

	// function untuk melakukan update record
	public function edit($id = NULL) 
	{
		if (!$id) redirect('errors/page_not_found');

		$data['current_user'] = $this->auth_model->current_user();
		$data['mahasiswa'] = $this->mahasiswa_model->find($id);
		$data['meta'] = ['title' => 'Mahasiswa'];
		$data['program_studi'] = ['Manajemen Informatika', 'Sistem Informasi', 'Teknik Komputer'];

		$this->form_validation->set_rules($this->mahasiswa_model->rules('edit'));
		if($this->form_validation->run() === TRUE) {
			$mahasiswa = [
				'id' => $id,
				'nim' => $this->input->post('nim', true),
				'nama' => $this->input->post('nama', true),
				'tpt_lahir' => $this->input->post('tpt_lahir', true),
				'tgl_lahir' => $this->input->post('tgl_lahir', true),
				'kelamin' => $this->input->post('kelamin', true),
				'alamat' => $this->input->post('alamat', true),
				'no_telepon' => $this->input->post('no_telepon', true),
				'program_studi' => $this->input->post('program_studi', true)
			];

			$updated = $this->mahasiswa_model->update($mahasiswa);
			if ($updated === 'success') {
				$this->session->set_flashdata('mahasiswa_updated', 'Data diubah!');
			}
			elseif ($updated === 'nim_duplicated') {	
				$this->session->set_flashdata('nim_duplicated', 'NIM ini sudah tersimpan!');
			} else {
				redirect('errors/something_wrong');
			}
		}
		$this->load->view('admin/akademik/mahasiswa/mahasiswa_edit', $data);
	}

	// function untuk menghapus record
	public function delete($id = null) 
	{
		if (!$id) 
			redirect('errors/page_not_found');

		if ($this->mahasiswa_model->delete($id)) {
			$this->session->set_flashdata('mahasiswa_deleted', 'Data dihapus!');
			redirect('admin/akademik/mahasiswa');
		} else {
			redirect('errors/something_wrong');
		}
	}
	
	// function untuk mengosongkan/mereset tabel record
	public function truncate() 
	{
		if ($this->mahasiswa_model->truncate()) {
			$this->session->set_flashdata('mahasiswa_truncated', 'Seluruh data dihapus!');
			redirect('admin/akademik/mahasiswa');
		} else {
			redirect('errors/something_wrong');
		}
	}
}