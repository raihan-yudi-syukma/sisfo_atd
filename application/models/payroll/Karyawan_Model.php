<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_Model extends CI_Model 
{
	// create 2nd database connection details object
	private $db2 = $this->load->database('database2', TRUE);
	private $_table = 'karyawan';
	
	public function get()
	{
		return $this->db2
			->order_by('nik', 'ASC')
			->get($this->_table)
			->result();
	}
 
	public function insert($karyawan) 
	{
		return $this->db2->insert($this->_table, $karyawan);
	}

	public function find($id) 
	{
		return $this->db2
			->get_where($this->_table, ['id' => $id])
			->row_array();
	}

	public function update($karyawan) 
	{
		// mendapatkan atribut data yang sebelumnya
		$current_data = $this->db2
			->get_where($this->_table, ['id' => $id])
			->row_array();

		// bila nik data yang di submit sama dengan nik yang sebelumnya, maka dilanjutkan operasi update
		if ($karyawan['nik'] == $current_data['nik']) {
			return $this->db2
				->update($this->_table, $karyawan, ['id' => $karyawan['id']]);
		} 

		// kemungkinan ada record yang niknya sama?
		$nik_duplicated = $this->db2
			->where('nik', $karyawan['nik'])
			->get($this->_table)
			->row();

		// bila ada record yang niknya sama atau tidak
		if ($duplicate) return 'nik_duplicated';

		return $this->db2
			->update($this->_table, $karyawan, ['id' => $karyawan['id']]);
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