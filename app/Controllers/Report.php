<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StockModel;
use App\Models\TransactionModel;

class Report extends BaseController
{
	function __construct()
	{
		$this->stock = new StockModel();
		$this->trans = new TransactionModel();
	}

	public function stock()
	{
		$data['stock'] = $this->stock->getStock();
		return view('report/stock', $data);
	}

	public function report_inbound(){

		if($this->request->getPost('submit') != null){
			$data['ibreport'] = $this->trans->getDetiltrans('IB', $this->request->getPost('rpdate1'), $this->request->getPost('rpdate2'));
		}else{
			$data['ibreport'] = $this->trans->getDetiltrans('IB', date('Y-m-d', strtotime('-10 days', strtotime(date('Y-m-d')))), date('Y-m-d'));
		}
		//$data['ibreport'] = $this->trans->getDetiltrans('IB', '2021-12-01', '2021-12-31');
		return view('report/inbound', $data);
	}

	public function report_outbound(){

		if($this->request->getPost('submit') != null){
			$data['obreport'] = $this->trans->getDetiltrans('OB', $this->request->getPost('rpdate1'), $this->request->getPost('rpdate2'));
		}else{
			$data['obreport'] = $this->trans->getDetiltrans('OB', date('Y-m-d', strtotime('-10 days', strtotime(date('Y-m-d')))), date('Y-m-d'));
		}
		
		return view('report/outbound', $data);
	}

}
