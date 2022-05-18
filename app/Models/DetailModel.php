<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
	protected $table                = 'tb_detail';
	protected $allowedFields        = ['trd_no', 'trd_type', 'trd_line', 'trd_item', 'trd_qty', 'trd_price', 'trd_total'];

	public function countData($type = false, $id = false)
	{
		if ($type == false and $id == false) {
			return $this->table($this->table)
				->where('trd_no', $id)
				->where('trd_type', $type)
				->countAllResults();
		} else {
			return $this->table($this->table)
				->countAllResults();
		}
	}

	public function getTransDetail($type, $id)
	{
		return $this->table($this->table)
			->join('tb_item', 'trd_item = tb_item.id')
			->where('trd_no', $id)
			->where('trd_type', $type)
			->get()
			->getResultArray();
	}

	public function insertTransDetail($data)
	{
		return $this->table($this->table)->insert($data);
	}

	public function insertBatchDetail($data)
	{
		return $this->table($this->table)->insertBatch($data);
	}
}
