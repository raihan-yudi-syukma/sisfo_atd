<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller 
{
	// function yang pertama kali dijalankan
	public function __construct() 
	{
		parent:: __construct();
		$this->load->model(['akademik/auth_model', 'payroll/jabatan_model']);
		// apakah ada admin login?
		if (!$this->auth_model->current_user())
			redirect('auth/login');

		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	// function untuk menampilkan data
	public function index() 
	{
		// @TODO: Create a data searching feature
		// @TODO: Create a data pagination feature

		// mendapatkan data user yang sedang login
		$data['current_user'] = $this->auth_model->current_user();

		// mendapatkan data
		$data['jabatan'] = $this->jabatan_model->get();

		// pengaturan judul
		$data['meta'] = ['title' => 'Jabatan'];

		$this->load->view(count($data['jabatan']) <= 0 ?
			'admin/payroll/jabatan/jabatan_empty' :
			'admin/payroll/jabatan/jabatan_list', $data
		);
	}

	// function untuk menyiapkan rules pada form validation tambah
	private function _rules_add() 
	{
		return [
			[// Kode
				'field' => 'kode_jabatan',
				'label' => 'Kode Jabatan',
				'rules' => 'trim|required|is_unique[jabatan.kode_jabatan]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'is_unique' => '%s ini sudah tersimpan!'
				)
			],
			[// Nama
				'field' => 'nama_jabatan',
				'label' => 'Nama Jabatan',
				'rules' => 'trim|required|is_unique[jabatan.nama_jabatan]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'is_unique' => '%s ini sudah tersimpan!'
				)
			],
			[// gaji
				'field' => 'gaji_pokok',
				'label' => 'Gaji Pokok',
				'rules' => 'required',
				'errors' => array('required' => '%s harus dinput!')
			],
			[// tunjangan
				'field' => 'tunjangan_beras',
				'label' => 'Tunjangan Beras',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')
			]
		];
	}

	// function untuk melakukan proses tambah data
	public function add() 
	{
		$data['current_user'] => $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Tambah Jabatan'];

		$this->form_validation->set_rules($this->_rules_add());
		if ($this->form_validation->run() == TRUE) {
			// data yang akan di input
			$jabatan = [
				'kode_jabatan' => $this->input->post('kode_jabatan', true),
				'nama_jabatan' => $this->input->post('nama_jabatan', true),
				'gaji_pokok' => $this->input->post('gaji_pokok', true),
				'tunjangan_beras' => $this->input->post('tunjangan_beras', true),
			];

			$saved = $this->jabatan_model->insert($jabatan);
			if ($saved) { 
				$this->session->set_flashdata('jabatan_saved', 'Data disimpan!');
			} else {
				redirect('errors/something_wrong');
			}
		}
		$this->load->view('admin/payroll/jabatan/jabatan_add', $data);
	}

	// function untuk menyiapkan rules untuk form validation ubah
	private function _rules_edit() {
		return [
			[// Kode
				'field' => 'kode_jabatan',
				'label' => 'Kode Jabatan',
				'rules' => 'trim|required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// Nama
				'field' => 'nama_jabatan',
				'label' => 'Nama Jabatan',
				'rules' => 'trim|required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// gaji
				'field' => 'gaji_pokok',
				'label' => 'Gaji Pokok',
				'rules' => 'required',
				'errors' => array('required' => '%s harus dinput!')
			],
			[// tunjangan
				'field' => 'tunjangan_beras',
				'label' => 'Tunjangan Beras',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')
			]
		];
	}

	// function untuk melakukan update record
	public function edit($id) 
	{
		if (!$id) redirect('errors/page_not_found');

		$data['current_user'] = $this->auth_model->current_user();
		$data['jabatan'] = $this->jabatan_model->find($id);
		$data['meta'] = ['title' => 'Ubah Jabatan'];

		$this->form_validation->set_rules($this->_rules_update());
		if($this->form_validation->run() == TRUE) {
			// data yang akan di input
			$jabatan = [
				'kode_jabatan' => $this->input->post('kode_jabatan', true),
				'nama_jabatan' => $this->input->post('nama_jabatan', true),
				'gaji_pokok' => $this->input->post('gaji_pokok', true),
				'tunjangan_beras' => $this->input->post('tunjangan_beras', true),
			];

			$updated = $this->jabatan_model->update($jabatan);
			if ($updated == 'success') {
				$this->session->set_flashdata('jabatan_updated', 'Data diubah!')
			}

			elseif ($updated != 'success') {
				if ($updated == 'kode_duplicated') {
					$this->session->set_flashdata('kode_duplicated', 'Kode ini sudah tersimpan!');
				}
				if ($updated == 'nama_duplicated') {
					$this->session->set_flashdata('nama_duplicated', 'Nama jabatan ini sudah tersimpan!'):	
				}	
			} 

			else {
				redirect('errors/something_wrong');
			}
		}
		$this->load->view('admin/akademik/payroll/jabatan/jabatan_edit', $data);
	}

	// function untuk menghapus record
	public function delete($id) 
	{
		if (!$id) redirect('errors/page_not_found');

		$deleted = $this->jabatan_model->delete($id);
		if ($deleted) {
			$this->session->set_flashdata('jabatan_deleted', 'Data dihapus!');
			redirect('admin/payroll/jabatan');
		} else {
			redirect('errors/something_wrong');
		}
	}
	
	// function untuk mengosongkan/mereset tabel record
	public function truncate() 
	{
		$trucated = $this->jabatan_model->truncate();
		if ($trucated) {
			$this->session->set_flashdata('jabatan_truncated', 'Seluruh data dihapus!');
			redirect('admin/payroll/jabatan');
		} else {
			redirect('errors/something_wrong');
		}
	}
}