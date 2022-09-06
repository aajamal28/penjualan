<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
	protected $table                = 'tb_stock';
	protected $primaryKey           = 'idstk';
	protected $allowedFields        = ['itemid', 'stock', 'date'];

	public function getStock($item = false)
	{
		if ($item === false) {
			return $this->table($this->table)
				->join('tb_item', 'itemid = id')
				->join('tb_pricelist', '(tb_pricelist.itemid = tb_stock.itemid and tb_pricelist.status = "1" )')
				->get()
				->getResultArray();
		} else {
			return $this->table($this->table)
				->join('tb_item', 'itemid = id')
				->where('itemid', $item)
				->get()
				->getRowArray();
		}
	}

	public function insertStock($data)
	{
		return $this->table($this->table)->insert($data);
	}

	public function updateStock($data, $id)
	{
		return $this->db->table($this->table)->set($data)
			->where('idstk', $id)
			->update();
	}

	public function stockin($item, $qty, $date)
	{
		$stock = $this->getStock($item);

		if (!$stock) {
			$data = [
				'itemid' => $item,
				'stock' => $qty,
				'date' => $date
			];
			$this->insertStock($data);
			return '200';
		} else {
			$newstock = $stock['stock'] + $qty;
			$data = [
				'stock' => $newstock,
				'date' => $date
			];
			$this->updateStock($data, $stock['idstk']);
			return '220';
		}
	}

	public function stockout($item, $qty, $date)
	{
		$stock = $this->getStock($item);

		if (!$stock) {
			return '250';
		} else {
			$newstock = $stock['stock'] - $qty;
			$data = [
				'stock' => $newstock,
				'date' => $date
			];
			$this->updateStock($data, $stock['idstk']);
			return '220';
		}
	}
}
