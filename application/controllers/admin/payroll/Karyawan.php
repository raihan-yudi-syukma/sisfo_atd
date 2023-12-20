<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller 
{
	// function yang pertama kali dijalankan
	public function __construct() 
	{
		parent:: __construct();
		$this->load->model(['akademik/auth_model', 'payroll/karyawan_model']);
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
		$data['karyawan'] = $this->karyawan_model->get();

		// pengaturan judul
		$data['meta'] = ['title' => 'Karyawan'];

		$this->load->view(count($data['karyawan']) <= 0 ?
			'admin/payroll/karyawan/karyawan_empty' :
			'admin/payroll/karyawan/karyawan_list', $data
		);
	}

	// function untuk menyiapkan rules pada form validation tambah
	private function _rules_add() 
	{
		return [
			[// Kode
				'field' => 'nik',
				'label' => 'NIK',
				'rules' => 'required|is_unique[karyawan.kode_karyawan]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'is_unique' => '%s ini sudah tersimpan!'
				)
			],
			[// Nama
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'trim|required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// Tempat Lahir
				'field' => 'tpt_lahir',
				'label' => 'Tempat Lahir',
				'rules' => 'trim|required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// Tanggal Lahir
				'field' => 'tgl_lahir',
				'label' => 'Tanggal Lahir',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// Kelamin
				'field' => 'kelamin',
				'label' => 'Kelamin',
				'rules' => 'required',
				'errors' => array('required' => '%s harus dipilih!')
			],
			[// alamat
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required',
				'errors' => array('required' => '%s harus dipilih!')
			],
			[// No. Telepon
				'field' => 'no_telepon',
				'label' => 'No. Telepon',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')
			]
		];
	}

	// function untuk melakukan proses tambah data
	public function add() 
	{
		$data['current_user'] => $this->auth_model->current_user();
		$data['meta'] = ['title' => 'Tambah Karyawan'];

		$this->form_validation->set_rules($this->_rules_add());
		if ($this->form_validation->run() == TRUE) {
			// data yang akan di input
			$karyawan = [
				'nik' => $this->input->post('nik', true),
				'nama' => $this->input->post('nama', true),
				'tpt_lahir' => $this->input->post('tpt_lahir', true),
				'tgl_lahir' => $this->input->post('tgl_lahir', true),
				'kelamin' => $this->input->post('kelamin', true),
				'alamat' => $this->input->post('alamat', true),
				'no_telepon' => $this->input->post('no_telepon', true),
			];

			$saved = $this->karyawan_model->insert($karyawan);
			if ($saved) {
				$this->session->set_flashdata('karyawan_saved', 'Data disimpan!');
			} else {
				redirect('errors/something_wrong');
			}
		}
		$this->load->view('admin/payroll/karyawan/karyawan_add', $data);
	}

	// function untuk menyiapkan rules untuk form validation ubah
	private function _rules_edit() {
		return [
			[// Kode
				'field' => 'nik',
				'label' => 'NIK',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// Nama
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'trim|required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// Tempat Lahir
				'field' => 'tpt_lahir',
				'label' => 'Tempat Lahir',
				'rules' => 'trim|required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// Tanggal Lahir
				'field' => 'tgl_lahir',
				'label' => 'Tanggal Lahir',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// Kelamin
				'field' => 'kelamin',
				'label' => 'Kelamin',
				'rules' => 'required',
				'errors' => array('required' => '%s harus dipilih!')
			],
			[// alamat
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required',
				'errors' => array('required' => '%s harus dipilih!')
			],
			[// No. Telepon
				'field' => 'no_telepon',
				'label' => 'No. Telepon',
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
		$data['karyawan'] = $this->karyawan_model->find($id);
		$data['meta'] = ['title' => 'Ubah Karyawan'];

		$this->form_validation->set_rules($this->_rules_update());
		if($this->form_validation->run() == TRUE) {
			// data yang akan di input
			$karyawan = [
				'nik' => $this->input->post('nik', true),
				'nama' => $this->input->post('nama', true),
				'tpt_lahir' => $this->input->post('tpt_lahir', true),
				'tgl_lahir' => $this->input->post('tgl_lahir', true),
				'kelamin' => $this->input->post('kelamin', true),
				'alamat' => $this->input->post('alamat', true),
				'no_telepon' => $this->input->post('no_telepon', true),
			];

			$updated = $this->karyawan_model->update($karyawan);
			if ($updated == 'success') {
				$this->session->set_flashdata('karyawan_updated', 'Data diubah!')
			}
			elseif ($updated == 'nik_duplicated') {	
				$this->session->set_flashdata('nik_duplicated', 'Kode ini sudah tersimpan!');
			} else {
				redirect('errors/something_wrong');
			}
		}
		$this->load->view('admin/akademik/payroll/karyawan/Karyawan_edit', $data);
	}

	// function untuk menghapus record
	public function delete($id) 
	{
		if (!$id) redirect('errors/page_not_found');

		$deleted = $this->karyawan_model->delete($id);
		if ($deleted) {
			$this->session->set_flashdata('karyawan_deleted', 'Data dihapus!');
			redirect('admin/payroll/karyawan');
		} else {
			redirect('errors/something_wrong');
		}
	}
	
	// function untuk mengosongkan/mereset tabel record
	public function truncate() 
	{
		$trucated = $this->Karyawan_model->truncate();
		if ($trucated) {
			$this->session->set_flashdata('Karyawan_truncated', 'Seluruh data dihapus!');
			redirect('admin/payroll/Karyawan');
		} else {
			redirect('errors/something_wrong');
		}
	}
}