<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_Model extends CI_Model
{
	private $_table = 'feedback';

	// rules untuk aturan menginput feedback pada form contact
	public function rules() 
	{
		return [
			[// name
			 	'field' => 'name',
			 	'label' => 'Nama',
			 	'rules' => 'trim|required|alpha_numeric_spaces|max_length[32]',
			 	'errors' => array(
			 		'required' => '%s harus diinput!',
			 		'alpha_numeric_spaces' => 'Mohon input %s dengan benar!',
			 		'max_length' => '%s hanya terdiri dari 32 karakter!'
			 	)
			],
			[// email
			 	'field' => 'email',
			 	'label' => 'E-mail',
			 	'rules' => 'trim|required|valid_email|max_length[64]',
			 	'errors' => array(
			 		'required' => '%s harus diinput!' ,
			 		'valid_email' => 'Mohon input %s yang valid!',
			 		'max_length' => '%s hanya terdiri dari 64 karakter!'
			 	)
			],
			[// message
				'field' => 'message',
				'label' => 'Message',
				'rules' => 'trim|required|max_length[150]',
				'errors' => array(
					'required' => 'Mohon masukkan pesan Anda!',
					'max_length' => 'Maks. 150 karakter!'
				)
			]
		];
	}
	
	// simpan data feedback yang di submit
	public function insert($feedback)
	{
		if (!$feedback) return;
		return $this->db->insert($this->_table, $feedback);
	}

	// mendapatkan semua record feedback
	public function get()
	{
		return $this->db
			->get($this->_table)
			->result();
	}

	// menghitung jumlah semua record
	public function count() {
		return $this->db->count_all($this->_table);
	}

	// hapus record
	public function delete($id)
	{
		if (!$id) return;
		return $this->db->delete($this->_table, ['id' => $id]);
 	}

 	// menghapus semua record, serta me-reset urutan auto increment (primary key: id)
 	public function truncate()
 	{
 		return $this->db->truncate($this->_table);
 	}
}