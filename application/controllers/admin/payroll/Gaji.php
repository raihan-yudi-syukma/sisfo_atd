<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['akademik/auth_model', 'payroll/gaji_model'])
		if (!$this->auth_model->current_user())
			redirect('auth/login');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index() {
		$data['current_user'] = $this->auth_model->current_user();
		$data['gaji'] = $this->gaji_model->get();

		$data['meta'] = ['title' => 'Penggajian'];
		$this->load->view(count($data['gaji']) <= 0 ?
			'admin/payroll/gaji/gaji_empty' :
			'admin/payroll/gaji/gaji_list', $data
		);
	}

	public function _rules_add() {
		return [
			[// No. Gaji
				'field' => 'no_gaji',
				'label' => 'No. Gaji',
				'rules' => 'trim|required|is_unique[gaji.no_gaji]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'is_unique' => '%s ini sudah tersimpan!'
				)
			],
			[// Tanggal Penggajian
				'field' => 'tgl_gaji',
				'label' => 'Tanggal Penggajian',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// nik
				'field' => 'nik',
				'label' => 'NIK',
				'rules' => 'required',
				'errors' => array('required' => '%s harus dipilih!')
			],
			[// jabatan
				'field' => 'kode_jabatan',
				'label' => 'Jabatan',
				'rules' => 'required',
				'errors' => array('required' => '%s harus dipilih!')
			],
			[// gaji_pokok
				'field' => 'gaji_pokok',
				'label' => 'Gaji',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// tunjangan beras
				'field' => 'tunjangan_beras',
				'label' => 'Tunjangan Beras',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// tunjangan beras
				'field' => 'potongan_telat',
				'label' => 'Potongan Telat',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// potongan absen
				'field' => 'potongan_absen',
				'label' => 'Potongan Absen',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// bonus
				'field' => 'bonus',
				'label' => 'Bonus',
				'rules' => 'required',
				'errors' => array('required' => '%s harus diinput!')]	
			],
			[// gaji_bersih
				'field' => 'gaji_bersih',
				'label' => 'Gaji Bersih',
				'rules' => 'required',
				'errors' => array('required' => '%s harus terisi!')]	
			]
		];
	}

	public function add() {

	// TODO: if the user choose an select's item, there are
	// fields that also change its value corresponding to select's choosed option.
	// reference: see JavaScript changeValue() function in project 'payroll2021'

	}
}