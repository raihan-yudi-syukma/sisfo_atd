<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_Model extends CI_Model 
{
	private $_table = 'article';

	// set rules untuk validasi data post artikel (intent = simpan atau edit artikel?)
	public function rules($intent = null)
	{
		if (!$intent) return;

		// bila niatnya mau simpan, maka rules untuk field nim:
		if ($intent === 'add') {
			$title_rules = [
				'field' => 'title',
				'label' => 'Judul',
				'rules' => 'trim|required|is_unique[article.title]|max_length[128]',
				'errors' => array(
					'required' => '%s harus diisi!',
					'is_unique' => '%s ini sudah terpakai!',
					'max_length' => 'Maks. karakter adalah 128!'
				)
			];
		}

		// bila niatnya mau ubah, maka rules untuk field nim begini:
		elseif ($intent === 'edit') {
			$title_rules = [
				'field' => 'title',
				'label' => 'Judul',
				'rules' => 'trim|required|max_length[128]',
				'errors' => array(
					'required' => '%s harus diisi!',
					'max_length' => 'Maks. karakter adalah 128!'
				)
			];
		}

		// mengoutput rules nya
		return [
			// title
				$title_rules,
			[// draft
				'field' => 'draft',
				'label' => 'Draft',
				'rules' => 'required|in_list[true,false]'
			],
			[// content
				'field' => 'content',
				'label' => 'Konten',
				'rules' => 'trim|required',
				'errors' => array('required' => '%s harus berisi^^')
			]
		];
	}

	// mendapatkan semua record artikel
	public function get()
	{
		return $this->db
			->get($this->_table)
			->result();
	}

	// function untuk mendapatkan article yang telah di publish (tidak draft / nilai field draft = 'false')
	public function get_published($limit = null, $offset = null)
	{
		// bila limit dan offset (rentang dan batasan) mendapatkan data tidak ditetapkan..
		if (!$limit && $offset) 
			return $this->db
				->get_where($this->_table, ['draft' => 'false'])
				->result();

		return $this->db
			->get_where($this->_table, ['draft' => 'false'], $limit, $offset)
			->result();
	}

	// mendapatkan jumlah semua artikel, atau semua artikel tergantung status: draft atau published
	public function count($status) 
	{
		if (!$status) return $this->count_all($this->_table);
		if ($status == 'draft') 
			return $this->db
				->get_where($this->_table, ['draft' => 'true'])
				->num_rows();
		if ($status == 'published')
			return $this->db
				->get_where($this->_table, ['draft' => 'false'])
				->num_rows(); 
	}

	// Mendapatkan data artikel sesuai id yang didapatkan
	public function find($id)
	{
		if(!$id) return;
		return $this->db
			->get_where($this->_table, ['id' => $id])
			->row();
	}
 
 	// mendapatkan data artikel sesuai dari 'slug' yang didaptkan 
 	// (ini penting untuk show article - halaman untuk baca artikel)
	public function find_by_slug($slug) 
	{
		if (!$slug) return;
		return $this->db
			->get_where($this->_table, ['slug' => $slug])
			->row();
	}

	// menyimpan artikel
	public function insert($article) 
	{
		if (!$article) return;
		return $this->db->insert($this->_table, $article);
	}

	// edit artikel
	public function update($article) 
	{
		// kalau id tdk ada, maka hentikan eksekusi
		if (!$article['id']) return;

		// mendapatkan data artikel yang sebelunya 
		$current_data = $this->find($article['id']);

		// teknik menghindari title plagiat
		// kalau title yang di submit sama dengan yang sebelum diedit,
		// maka proses update dilanjtkan
		if ($article['title'] == $current_data->title) {
			$this->db->update($this->_table, $article, ['id' => $article['id']]);
			$this->db->update($this->_table,
				['updated_at' => date("Y-m-d H:i:s")], ['id' => $article['id']]);
			return 'success';
		}

		// kemungkinan ada artikel lain yang titlenya sama?
		$title_duplicated = $this->db
			->where('title', $article['title'])
			->get($this->_table)
			->row();
		// kalau iya, maka hentikan eksekusi selanjutnya
		if ($title_duplicated) return 'title_duplicated';

		// bilai tidak ada masalah, lanjutkan update artikel
		$this->db->update($this->_table, $article, ['id' => $article['id']]);
		$this->db->update($this->_table,
			['updated_at' => date("Y-m-d H:i:s")], ['id' => $article['id']]);
		return 'success';
	}

	// hapus artikel
	public function delete($id)
	{
		// bila id tidak ada nilai, hentikan eksekusi
		if (!$id) return;
		return $this->db->delete($this->_table, ['id' => $id]);
	}

	// reset tabel 'article'
	public function truncate() 
	{
		return $this->db->truncate($this->_table);
	}
}