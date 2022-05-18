<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use App\Models\PriceListModel;

class PriceList extends BaseController
{
	function __construct()
	{
		$this->item = new ItemModel();
		$this->pcl = new PriceListModel();
	}

	public function index()
	{
		$data['price'] = $this->pcl->getAllPrice();
		$data['item'] = $this->item->getItem();
		return view('master/pricelist', $data);
	}

	public function save()
	{
		$post = $this->request->getPost();
		$data2 = [
			'status' => '0',
			'expire' => date('Y-m-d H:i:s')
		];
		$this->pcl->updatePrice($data2, $post['plItem']);

		$data = [
			'itemid' => $post['plItem'],
			'p_price' => $post['plpprice'],
			's_price' => $post['plsprice'],
			'start' => $post['pldate'],
			'status' => '1',
			'created_by' => $post['plby']
		];

		$this->pcl->insertPrice($data);
		session()->setFlashdata('success', 'Update Harga berhasil!!!');
		return redirect()->to(site_url('/master/harga/'));
	}

	public function priceItem($item)
	{
		//$item = $this->input->get('item');
		$data = $this->pcl->getItemPrice($item);
		echo json_encode($data);
	}
}
