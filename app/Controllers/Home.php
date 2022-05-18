<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\SupplierModel;
use App\Models\StockModel;
use App\Models\TransactionModel;
use App\Models\DetailModel;

class Home extends BaseController
{
	function __construct()
	{
		$this->spl = new SupplierModel();
		$this->item = new ItemModel();
		$this->trans = new TransactionModel();
		$this->trdetil = new DetailModel();
		$this->stk = new StockModel();
	} 

	public function index()
	{
		$session = session();
		$data['totalBarang'] = $this->item->countData();
		$data['totalSupplier'] = $this->spl->countData();
		$data['totalIb'] = $this->trans->countData('IB');
		$data['totalOb'] = $this->trans->countData('OB');
		$data['user'] = $session->get('name');
		return view('main', $data);
	}

	
}
