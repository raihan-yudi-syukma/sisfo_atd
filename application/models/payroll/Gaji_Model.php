<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_Model extends CI_Model 
{
	// create 2nd database connection details object
	private $db2 = $this->load->database('database2', TRUE);
	private $_table = 'gaji';
	
	public function get()
	{
		return $this->db2
			->order_by('no_gaji', 'ASC')
			->get($this->_table)
			->result();
	}


	// @TODO: Create this payroll system almost the same like project 'payroll2021'

 
	public function insert($gaji) 
	{
		return $this->db2->insert($this->_table, $gaji);
	}

	public function find($id) 
	{
		return $this->db2
			->get_where($this->_table, ['id' => $id])
			->row_array();
	}

	public function update($gaji) 
	{
		// mendapatkan atribut data yang sebelumnya
		$current_data = $this->db2
			->get_where($this->_table, ['id' => $id])
			->row_array();

		// bila no_gaji data yang di submit sama dengan no_gaji yang sebelumnya, maka dilanjutkan operasi update
		if ($gaji['no_gaji'] == $current_data['no_gaji']) {
			return $this->db2
				->update($this->_table, $gaji, ['id' => $gaji['id']]);
		} 

		// kemungkinan ada record yang no_gaji nya sama?
		$duplicate = $this->db2
			->where('no_gaji', $gaji['no_gaji'])
			->get($this->_table)
			->row();

		// bila ada record yang nimnya sama atau tidak
		if ($duplicate) return 'duplicated';

		return $this->db2
			->update($this->_table, $gaji, ['id' => $gaji['id']]);
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