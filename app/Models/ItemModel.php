<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
	protected $table                = 'tb_item';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['id', 'desc', 'specs', 'category', 'unit', 'created_by'];

	// Dates
	protected $createdField         = 'created_at';

	public function countData()
	{
		return $this->table($this->table)
			->countAllResults();
	}

	public function getItem($id = false)
	{
		if ($id === false) {
			return $this->table($this->table)
				->join('tb_category', 'tb_item.category = tb_category.idcat')
				->join('tb_pricelist','tb_pricelist.itemid = tb_item.id and tb_pricelist.status = "1"')
				->get()
				->getResultArray();
		} else {
			return $this->table($this->table)
				->join('tb_category', 'tb_item.category = tb_category.idcat')
				->join('tb_pricelist','tb_pricelist.itemid = tb_item.id and tb_pricelist.status = "1"')
				->where('tb_item.id', $id)
				->get()
				->getRowArray();
		}
	}

	public function insertItem($data)
	{
		return $this->table($this->table)->insert($data);
	}

	public function updateItem($data, $id)
	{
		return $this->db->table($this->table)->update($data, array('id' => $id));
	}

	public function getItemByCategory($cat)
	{
		return $this->table($this->table)
				->join('tb_category', 'tb_item.category = tb_category.idcat')
				->join('tb_pricelist','tb_pricelist.itemid = tb_item.id and tb_pricelist.status = "1"')
				->where('tb_item.category', $cat)
				->get()
				->getResultArray();
	}
}
