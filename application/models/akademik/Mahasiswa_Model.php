<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_Model extends CI_Model 
{
	private $_table = 'mahasiswa';

	// function untuk menyiapkan rules pada form validation add
	public function rules($intent = null) 
	{
		if (!$intent) return;

		if ($intent === 'add') {
			$nim_rules = [
				'field' => 'nim',
				'label' => 'NIM',
				'rules' => 'trim|required|integer|greater_than[0]|is_unique[mahasiswa.nim]|max_length[10]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'integer' => '%s hanya terdiri dari angka',
					'greater_than' => 'Nilai %s tidak boleh kosong!',
					'is_unique' => '%s ini sudah tersimpan!',
					'max_length' => 'Maks. 10 digit!'
				)
			];
		} 
		elseif ($intent === 'edit') {
			$nim_rules = [
				'field' => 'nim',
				'label' => 'NIM',
				'rules' => 'trim|required|integer|greater_than[0]|max_length[10]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'integer' => '%s hanya terdiri dari angka',
					'greater_than' => 'Nilai %s tidak boleh kosong!',
					'max_length' => 'Maks. 10 digit!'
				)
			];
		}
		
		return [
			// NIM
				$nim_rules,
			[// Nama
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'trim|required|alpha_numeric_spaces',
				'errors' => array(
					'required' => '%s harus diinput!',
					'alpha_numeric_spaces' => 'Mohon input %s dengan benar!'
				)
			],
			[// Tempat Lahir
				'field' => 'tpt_lahir',
				'label' => 'Tempat Lahir',
				'rules' => 'trim|required|alpha_numeric_spaces|max_length[30]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'alpha_numeric_spaces' => 'Mohon input %s dengan benar!'
				)
			],
			[// Tanggal Lahir
				'field' => 'tgl_lahir',
				'label' => 'Tanggal Lahir',
				'rules' => 'trim|required',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// Jenis Kelamin
				'field' => 'kelamin',
				'label' => 'Jenis Kelamin',
				'rules' => 'trim|required',
				'errors' => array('required' => '%s harus dipilih!')
			],
			[// Alamat
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'trim|required|max_length[100]',
				'errors' => array('required' => '%s harus diinput!')
			],
			[// No Telepon
				'field' => 'no_telepon',
				'label' => 'No. Telepon',
				'rules' => 'trim|required|integer|max_length[15]',
				'errors' => array(
					'required' => '%s harus diinput!',
					'integer' => '$s hanya terdiri dari angka!'
				)
			],
			[// Prodi
				'field' => 'program_studi',
				'label' => 'Program Studi',
				'rules' => 'trim|required',
				'errors' => array('required' => '%s harus dipilih!')
			]
		];
	}
	
	public function get($limit = null, $offset = null)
	{
		if (!$limit && $offset) 
			return $this->db
				->order_by('nim', 'ASC')
				->get($this->_table)
				->result();

		return $this->db
			->order_by('nim', 'ASC')
			->get($this->_table, $limit, $offset)
			->result();
	}

	public function search($keyword, $kelamin, $program_studi) 
	{
		// keyword = value, kelamin = empty, program_studi = empty
		if (!empty($keyword) && empty($kelamin) && empty($program_studi)) {
			$this->db
				->like('nim', $keyword)
				->or_like('nama', $keyword);
		}

		// keyword = value, kelamin = value, program_studi = empty
		elseif (!empty($keyword) && !empty($kelamin) && empty($program_studi)) {
			$this->db
				->like('nim', $keyword)
				->or_like('nama', $keyword)
				->where('kelamin', $kelamin);
		}

		// keyword = value, kelamin = value, program_studi = value
		elseif (!empty($keyword) && !empty($kelamin) && !empty($program_studi)) {
			$this->db
				->where(['kelamin' => $kelamin, 'program_studi' => $program_studi])
				->like('nim', $keyword)
				->or_like('nama', $keyword);
		}

		// keyword = empty, kelamin = value, program_studi = value
		elseif (empty($keyword) && !empty($kelamin) && !empty($program_studi)) {
			$this->db
				->where(['kelamin' => $kelamin, 'program_studi' => $program_studi]);
		}

		// keyword = value, kelamin = empty, program_studi = value
		elseif (!empty($keyword) && empty($kelamin) && !empty($program_studi)) {
			$this->db
				->like('nim', $keyword)
				->or_like('nama', $keyword)
				->where('program_studi', $program_studi);
		}

		// keyword = empty, kelamin = value, program_studi = empty
		elseif (empty($keyword) && !empty($kelamin) && empty($program_studi)) {
			$this->db
				->where('kelamin', $kelamin);
		}

		// keyword = empty, kelamin = empty, program_studi = value
		elseif (empty($keyword) && empty($kelamin) && !empty($program_studi)) {
			$this->db
				->where('program_studi', $program_studi);
		} 

		// keyword = empty, kelamin = empty, program_studi = empty
		// and runs the query
		return $this->db
			->order_by('nim', 'ASC')
			->get($this->_table)
			->result();
	}

	public function count($program_studi = null) 
	{
		if(!$program_studi) 
			return $this->db->count_all($this->_table);

		return $this->db
			->get_where($this->_table, ['program_studi' => $program_studi])
			->num_rows();
	}
 
	public function insert($mahasiswa) 
	{
		if (!$mahasiswa) return;
		return $this->db->insert($this->_table, $mahasiswa);
	}

	public function find($id) 
	{
		if (!$id) return;
		return $this->db
			->get_where($this->_table, ['id' => $id])
			->row_array();
	}

	public function update($mahasiswa) 
	{
		if (!$mahasiswa['id']) return;
		// mendapatkan atribut data yang sebelumnya
		$current_data = $this->find($mahasiswa['id']);

		// bila nim data yang di submit sama dengan nim yang sebelumnya, maka dilanjutkan operasi update
		if ($mahasiswa['nim'] == $current_data['nim']) {
			$this->db->update($this->_table, $mahasiswa, ['id' => $mahasiswa['id']]);
			$this->db->update($this->_table, 
				['updated_at' => date("Y-m-d H:i:s")], ['id' => $mahasiswa['id']]);
			return 'success';
		} 

		// kemungkinan ada record yang nimnya sama?
		$nim_duplicated = $this->db
			->where('nim', $mahasiswa['nim'])
			->get($this->_table)
			->row();

		// bila ada record yang nimnya sama atau tidak
		if ($nim_duplicated) return 'nim_duplicated';

		$this->db->update($this->_table, $mahasiswa, ['id' => $mahasiswa['id']]);
		$this->db->update($this->_table, 
				['updated_at' => date("Y-m-d H:i:s")], ['id' => $mahasiswa['id']]);
		return 'success';
	}

	public function delete($id) 
	{
		if (!$id) return;
		return $this->db
			->where('id', $id)
			->delete($this->_table);
	}

	public function truncate() 
	{
		return $this->db->truncate($this->_table);
	}	
}