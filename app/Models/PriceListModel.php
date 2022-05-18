<?php

namespace App\Models;

use CodeIgniter\Model;

class PriceListModel extends Model
{
	protected $table                = 'tb_pricelist';
	protected $primaryKey           = 'idpl';
	protected $allowedFields        = ['itemid', 'p_price', 's_price', 'start', 'expire', 'status', 'created_by'];

	public function getAllPrice($item = false)
	{
		if ($item === false) {
			return $this->table($this->table)
				->join('tb_item', 'itemid = id')
				->get()
				->getResultArray();
		} else {
			return $this->table($this->table)
				->join('tb_item', 'itemid = id')
				->where('itemid', $item)
				->get()
				->getResultArray();
		}
	}

	public function getItemPrice($item)
	{

		return $this->table($this->table)
			->join('tb_item', 'itemid = id')
			->join('tb_stock', 'tb_stock.itemid = id')
			->where('tb_pricelist.itemid', $item)
			->where('status', '1')
			->get()
			->getRowArray();
	}

	public function insertPrice($data)
	{
		return $this->table($this->table)->insert($data);
	}

	public function updatePrice($data, $id)
	{
		return $this->db->table($this->table)->set($data)
			->where('itemid', $id)
			->where('expire', '')
			->update();
	}
}
