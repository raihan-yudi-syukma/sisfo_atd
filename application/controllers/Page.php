<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller 
{

	// function yang pertama kali dijalankan
	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['akademik/auth_model', 'akademik/mahasiswa_model']);
	}

	// function default yang akan dijlankan, bila pemanggilan controller(url),
	// tidak menyertakan nama function
	public function index() 
	{
		// mendapat data user (TRUE or FALSE)
		$data['current_user'] = $this->auth_model->current_user();

		// jumlah mahasiswa
		$data['count_prodi'] = [
			'count_mi' => $this->mahasiswa_model->count('Manajemen Informatika'),
			'count_si' => $this->mahasiswa_model->count('Sistem Informasi'),
			'count_tk' => $this->mahasiswa_model->count('Teknik Komputer'),
		];

		$data['meta'] = ['title' => 'Home']; //<- judul
		$this->load->view('home', $data);// <- memuat view
	}

	// fungsi untuk load view about
	public function about() 
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'About'];
		$this->load->view('about', $data);
	}

	// fungsi untuk load view contact
	public function contact() 
	{
		// memuat class codeigniter yang diperlukan
		$this->load->model('akademik/feedback_model');
		$this->load->library('form_validation');

		// set data untuk view
		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Hubungi Kami'];

		// set rules validasi form, kemudian bila run outputnya TRUE..
		$this->form_validation->set_rules($this->feedback_model->rules());
		if ($this->form_validation->run() == TRUE) {
			// data yang disubmit
			$feedback = [
				'id' => uniqid('', true),
				'name' => $this->input->post('name', true),
				'email' => $this->input->post('email', true),
				'message' => $this->input->post('message', true)
			];
			// bila simpan data berhasil atau tidak..
			if ($this->feedback_model->insert($feedback)) {
				$this->session->set_flashdata('message_sent', 
					'Terimakasih telah menghubungi kami!<br> Pesan Anda telah terkirim.');
			} else {
				redirect('errors/something_wrong');
			}
		} 
		$this->load->view('contact', $data);
	}
}