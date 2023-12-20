<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller
{
	// function yang pertama dijalankan
	public function __construct() 
	{
		parent::__construct();
		// memuat model yang dipakai semua function
		$this->load->model('akademik/auth_model');
		// Apakah user sedang login?
		if (!$this->auth_model->current_user()) 
			redirect('auth/login');
	}

	// function index adalah function default yang akan dijalankan,
	// bila pemanggilan controller tidak menyertakan nama function
	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Settings'];
		$this->load->view('admin/setting', $data);
	}

	public function upload_avatar() 
	{
		echo "Wait...";
	}

	public function remove_avatar()
	{
		echo 'Hold on..';
	}

	public function profile_edit() 
	{
		// memuat classes yang dibutuhkan
		$this->load->library('form_validation');
		$this->load->model('akademik/profile_model');

		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Edit Profile'];

		// menyiapkan rules untuk validasi form
		$this->form_validation->set_rules($this->profile_model->profile_rules());
		if ($this->form_validation->run() === TRUE) {

			// data yang disubmit user
			$profile = [
				'id' => $data['current_user']->id,
				'name' => $this->input->post('name', true),
				'email' => $this->input->post('email', true)
			];

			// apakah profile berhasil diupdate atau tidak?
			if ($this->profile_model->update($profile)) {
				$this->session->set_flashdata('message', 'Profile updated!');
				redirect('admin/setting');
			} else {
				redirect('errors/something_wrong'); //<- terjadi kesalahan
			}
		}
		// bila user belum submit form, tampilkan form nya
		$this->load->view('admin/profile_edit', $data);
	}

	// konfirmasi password lama terlebih dulu, untuk keamanan admin
	public function password_verify()
	{
		// memuat library
		$this->load->library('form_validation');

		// menyiapkan data yang diperlukan
		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Verifikasi Password'];

		// set rules
		$this->form_validation->set_rules(
			'password', 
			'Password', 
			'trim|required', 
			array('required' => 'Mohon input %s admin!')
		);
		if ($this->form_validation->run() === TRUE) {
			$password = $this->input->post('password');

			// bila password tidak cocok atau cocok...
			if (!password_verify($password, $data['current_user']->password)) {
				$this->session->set_flashdata('verify_failed', 'Password tidak cocok!');
			} else {
				return redirect('admin/setting/password_edit');
			}
		}
		// bila kondisi if tidak terpenuhi, tampilkan form verifikasi
		$this->load->view('admin/password_verify', $data);
	}

	public function password_edit() 
	{
		// memuat classes yang dibutuhkan
		$this->load->library('form_validation');
		$this->load->model('akademik/profile_model');

		// set data
		$data['current_user'] = $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Change Password'];

		// menyiapkan rules untuk validasi form
		$this->form_validation->set_rules($this->profile_model->password_rules());
		if ($this->form_validation->run() === TRUE) {

			// data yang disubmit user
			$password = [
				'id' => $data['current_user']->id,
				'password' => password_hash($this->input->post('pasword', true), PASSWORD_DEFAULT)
			];

			// apakah password berhasil diubah atau tidak?
			if ($this->profile_model->update($password)) {
				$this->session->set_flashdata('message', 'Password changed!');
				redirect('admin/setting');
			} else {
				redirect('errors/something_wrong'); //<- terjadi kesalahan
			}
		}
		// tampilkan form, bila kondisi diatas tidak terpenuhi
		$this->load->view('admin/password_edit', $data);
	}
}