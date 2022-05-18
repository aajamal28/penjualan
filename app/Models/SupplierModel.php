<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
	protected $table                = 'tb_supplier';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['idspl', 'name', 'address', 'telp', 'created_by'];

	// Dates
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';

	public function countData()
	{
		return $this->table($this->table)
			->countAllResults();
	}

	public function getSupplier($id = false)
	{
		if ($id === false) {
			return $this->table($this->table)
				->get()
				->getResultArray();
		} else {
			return $this->table($this->table)
				->where('idspl', $id)
				->get()
				->getRowArray();
		}
	}

	public function insertSupplier($data)
	{
		return $this->table($this->table)->insert($data);
	}

	public function updateSupplier($data, $id)
	{
		return $this->db->table($this->table)->update($data, array('idspl' => $id));
	}
}
