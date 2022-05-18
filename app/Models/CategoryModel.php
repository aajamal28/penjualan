<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
	protected $table                = 'tb_category';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['idcat','category', 'created_by'];

	// Dates
	protected $createdField         = 'created_at';

	public function countData()
	{
		return $this->table($this->table)
			->countAllResults();
	}

	public function getCategory($id = false)
	{
		if ($id === false) {
			return $this->table($this->table)
				->get()
				->getResultArray();
		} else {
			return $this->table($this->table)
				->where('id', $id)
				->get()
				->getRowArray();
		}
	}

	public function insertCategory($data)
	{
		return $this->table($this->table)->insert($data);
	}
}
