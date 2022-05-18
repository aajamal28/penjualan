<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
	protected $table                = 'tb_trans';
	protected $primaryKey           = 'tr_no';
	protected $allowedFields        = ['tr_no', 'tr_type', 'tr_date', 'tr_time', 'tr_doc', 'tr_docdate', 'tr_splid', 'tr_cust', 'tr_total', 'tr_nilai', 'tr_remark'];

	public function countData($type)
	{
		return $this->table($this->table)
			->where('tr_type', $type)
			->countAllResults();
	}

	public function getTrans($type, $id = false)
	{
		if ($id === false) {
			if ($type == 'IB') {
				return $this->table($this->table)
					->join('tb_supplier', 'tr_splid = idspl')
					->where('tr_type', 'IB')
					->get()
					->getResultArray();
			} else {
				return $this->table($this->table)
					->where('tr_type', 'OB')
					->get()
					->getResultArray();
			}
		} else {
			if ($type == 'IB') {
				return $this->table($this->table)
					->join('tb_supplier', 'tr_splid = idspl')
					->where('tr_no', $id)
					->where('tr_type', 'IB')
					->get()
					->getRowArray();
			} else {
				return $this->table($this->table)
					->where('tr_no', $id)
					->where('tr_type', 'OB')
					->get()
					->getRowArray();
			}
			// return $this->table($this->table)
			// 	->join('tb_category', 'tb_item.category = tb_category.idcat')
			// 	->where('tb_item.id', $id)
			// 	->get()
			// 	->getRowArray();
		}
	}

	public function getNomorTrans($type)
	{
		$sql = $this->db->query("select max(tr_no) as no_trans from " . $this->table . " where tr_type = '" . $type . "';");
		$no =  $sql->getRowArray();
		//[no_trans] => P20211200002

		if ($no['no_trans'] == null) {
			if ($type == 'IB') {
				$pre = 'P';
			} else {
				$pre = 'S';
			}
			$dt = date('Ym');
			$no = sprintf("%04s", '1');
			$trno = $pre . $dt . $no;
		} else {
			$last = $no['no_trans'];
			$pre = substr($last, 0, 1);
			$dt = substr($last, 1, 6);
			if ($dt < date('Ym')) {
				$dt1 = date('Ym');
				$newno = sprintf("%04s", '1');
			} else {
				$dt1 = substr($last, 1, 6);
				$no = substr($last, 7);
				$no++;
				$newno = sprintf("%04s", $no);
			}
			$trno = $pre . $dt1 . $newno;
		}

		return $trno;
	}

	public function insertTrans($data)
	{
		return $this->table($this->table)->insert($data);
	}

	public function updatePrice($data, $id, $type)
	{
		return $this->db->table($this->table)->set($data)
			->where('tr_no', $id)
			->where('tr_type', $type)
			->update();
	}

	public function getDetiltrans($type, $from, $to)
	{
		if ($type == 'IB') {
			return $this->table($this->table)
				->join('tb_supplier', 'tr_splid = idspl')
				->join('tb_detail', 'trd_no = tr_no and trd_type = tr_type')
				->join('tb_item', 'tb_item.id = trd_item')
				->where('tr_type', $type)
				->where('tr_date >=', $from)
				->where('tr_date <=', $to)
				->get()
				->getResultArray();
		} else {
			return $this->table($this->table)
				->join('tb_detail', 'trd_no = tr_no and trd_type = tr_type')
				->join('tb_item', 'tb_item.id = trd_item')
				->where('tr_type', $type)
				->where('tr_date >=', $from)
				->where('tr_date <=', $to)
				->get()
				->getResultArray();
		}
	}
}
