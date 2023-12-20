<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_Model extends CI_Model 
{
	// create 2nd database connection details object
	private $db2 = $this->load->database('database2', TRUE);
	private $_table = 'jabatan';
	
	public function get()
	{
		return $this->db2
			->order_by('kode_jabatan', 'ASC')
			->get($this->_table)
			->result();
	}
 
	public function insert($jabatan) 
	{ 
		return $this->db2->insert($this->_table, $jabatan);
	}

	public function find($id) 
	{
		return $this->db2
			->get_where($this->_table, ['id' => $id])
			->row_array();
	}

	public function update($jabatan) 
	{
		if (!$jabatan) return;
		// mendapatkan atribut data yang sebelumnya
		$current_data = $this->db2
			->get_where($this->_table, ['id' => $jabatan['id']])
			->row_array();

		// bila kode jabatan dan nama jabatan dyang di submit sama dengan kode jabatan yang sebelumnya, maka dilanjutkan operasi update
		if (($jabatan['kode_jabatan'] == $current_data['kode_jabatan'] &&
			 $jabatan['nama_jabatan'] == $current_data['nama_jabatan'])) {
			$this->db2->update($this->_table, $jabatan, ['id' => $jabatan['id']]);
			return 'success';
		}

		// kemungkinan ada record yang kode nya sama?
		$kode_duplicated = $this->db2
			->where('kode_jabatan', $jabatan['kode_jabatan'])
			->get($this->_table)
			->row();
		// bila ada record yang kode nya sama
		if ($kode_duplicated) return 'kode_duplicated';

		// kemungkinan ada record yang nama nya sama?
		$nama_duplicated = $this->db2
			->where('nama_jabatan', $jabatan['nama_jabatan'])
			->get($this->_table)
			->row();
		// bila ada record yang nama nya sama atau tidak
		if ($nama_duplicated) return 'nama_duplicated';

		$this->db2->update($this->_table, $jabatan, ['id' => $jabatan['id']]);
		return 'success';
	}

	public function delete($id) 
	{
		if (!$id) return;
		return $this->db2
			->where('id', $id) 
			->delete($this->_table);
	}

	public function truncate() 
	{
		return $this->db2->truncate($this->_table);
	}	
}