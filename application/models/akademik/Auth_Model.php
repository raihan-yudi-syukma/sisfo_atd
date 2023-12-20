<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model 
{
	private $_table = 'admin';
	const SESSION_KEY = 'user_id';

	// function untuk menyiapkan rules untuk validasi form login
	public function rules() 
	{
		return [
			[// username
				'field' => 'username',
				'label' => 'E-mail atau Username',
				'rules' => 'trim|required|max_length[64]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'max_length' => '%s hanya terdiri dari 64 karakter!'
				)
			],
			[// password
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required|max_length[255]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'max_length' => '%s\'s maximum characthers reached!(255)'
				)
			]
		];
	}

	// function yang mengoutput TRUE or FALSE
	public function login($username, $password) 
	{
		// mendapatkan email atau username
		$user = $this->db
			->where('email', $username)
			->or_where('username', $username)
			->get($this->_table)
			->row();

		// verikasi data yang di submit
		if (!$user) return FALSE;
		if (!password_verify($password, $user->password)) return FALSE; 

		// membuat session, bila berhasil login
		$this->session->set_userdata([self::SESSION_KEY => $user->id]);
		// mendapatkan timestamp pada perangkat yang digunakan
		$this->db->update($this->_table, 
				['last_login' => date("Y-m-d H:i:s")], ['id' => $id]);
		// data user yang login
		return $this->session->has_userdata(self::SESSION_KEY);
	}

	// function untuk mendapatkan user yang sedang login(session)
	public function current_user()
	{
		// bila data user tidak ada (kemungkinan tidak login/ no session)
		if (!$this->session->has_userdata(self::SESSION_KEY)) return null;

		// output data user yang login dari database
		$user_id = $this->session->userdata(self::SESSION_KEY);
		return $this->db->get_where($this->_table, ['id' => $user_id])->row();
	}

	// function untuk menghapus session
	public function logout() 
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}
}