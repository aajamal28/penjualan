<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ItemModel;

class Store extends BaseController
{
	private $itmModel;
	private $catModel;
	private $cart;

	function __construct()
	{
		$this->itmModel = new ItemModel();
		$this->catModel = new CategoryModel();
		$this->cart = cart();
	}
	public function index()
	{
		$data['product'] = $this->itmModel->getItem();
		$data['cartTotal'] = count($this->cart->contents());
		return view('store', $data);
	}

	public function category($cat)
	{
		$category = $this->catModel->getCategorySlug($cat);
		$catId = $category['idcat'];
		$data['product']= $data['product'] = $this->itmModel->getItemByCategory($catId);
		$data['cartTotal'] = count($this->cart->contents());;
		return view('store', $data);
	}
	
	public function detail($id)
	{
		$data['product'] = $this->itmModel->getItem($id);
		return view('detail', $data);
	}
}
