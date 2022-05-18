<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use App\Models\SupplierModel;
use App\Models\TransactionModel;
use App\Models\DetailModel;
use App\Models\StockModel;


class Outbound extends BaseController
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
		$data['outbound'] = $this->trans->getTrans('OB');
		return view('trans/outbound', $data);
	}

	public function add()
	{
		$data['item'] = $this->item->getItem();
		$data['supplier'] = $this->spl->getSupplier();
		$data['trno'] = $this->trans->getNomorTrans('OB');
		return view('trans/outbound_add', $data);
	}

	public function save()
	{
		$post = $this->request->getPost();
		//print_r($post);
		//tr_no	tr_type	tr_date	tr_time	tr_doc	tr_docdate	tr_splid	tr_cust	tr_total	tr_remark	

		$datatrn = [
			'tr_no' => $post['trno'],
			'tr_type' => $post['trtype'],
			'tr_date' => $post['trdate'],
			'tr_time' => $post['trtime'],
			'tr_cust' => $post['trcust'],
			'tr_remark' => $post['trremark'],
			'tr_total' => count($post['trditem1']),
			'tr_nilai' => $post['trnilai']
		];

		$this->trans->insertTrans($datatrn);

		$no = $post['trdno'];
		$item = $post['trditem1'];
		$desc = $post['trddesc1'];
		$qty = $post['trdqty1'];
		$unit = $post['trdunit1'];
		$price = $post['trdprice1'];
		$total = $post['trdextend1'];

		$datatrd = array();

		foreach( $item as $n => $itm){
			$datatrd[] = array(
				'trd_no' => $post['trno'],
				'trd_type' => $post['trtype'],
				'trd_item' => $itm,
				'trd_qty' => $qty[$n],
				'trd_price' => $price[$n],
				'trd_total' => $total[$n],
				'trd_line' => $no[$n]
			);

			$this->stk->stockout($itm, $qty[$n], date('Y-m-d H:i:s'));
		}
		$this->trdetil->insertBatchDetail($datatrd);
		//print_r($datatrn);
		//echo "<br>";
		//print_r($datatrd);
		session()->setFlashdata("success", "Penjualan Nomor ". $post['trno'] ." tersimpan !!!");
		return redirect()->to(site_url('/outbound'));
	}

	public function detail($id)
	{
		$data['trans'] = $this->trans->getTrans('OB', $id);
		$data['detail'] = $this->trdetil->getTransDetail('OB', $id);
		$data['trid'] =  $id;
		return view('trans/outbound_detail', $data);
	}
}
