<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Model extends CI_Model
{
	private $_table = 'admin';

	// rules untuk validasi form edit profil admin
	public function profile_rules()
	{
		return [
			[// name
				'field' => 'name',
				'label' => 'Nama',
				'rules' => 'trim|required|alpha_numeric_spaces|max_length[32]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'alpha_numeric_spaces' => 'Mohon isi %s dengan benar!',
					'max_length' => 'Maks. karakter adalah 32!'
				)
			],
			[// email
				'field' => 'email',
				'label' => 'E-mail',
				'rules' => 'trim|required|valid_email|max_length[32]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'valid_email' => 'Mohon masukkan %s yang yang valid!',
					'max_length' => 'Maks. karakter adalah 32!'
				)
			]
		];
	}

	// function untuk set rules validasi form edit password admin
	public function password_rules()
	{
		return [
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required',
				'errors' => array ('required' => 'Mohon input %s!')
			],
			[
				'field' => 'password_confirm',
				'label' => 'Konfirmasi Password',
				'rules' => 'trim|required|matches[password]',
				'errors' => array (
					'required' => 'Input %s',
					'matches' => 'Password tidak tepat'
				)
			]
		];
	}

	// update profile or password
	public function update ($data)
	{
		if (!$data['id']) 
			return;
		return $this->db->update($this->_table, $data, ['id' => $data['id']]);
	}
}