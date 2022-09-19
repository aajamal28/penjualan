<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use App\Models\PriceListModel;

class Shop extends BaseController
{
	private $prcModel;
	private $itmModel;
	private $cart;

	function __construct()
	{
		$this->prcModel = new PriceListModel();
		$this->itmModel = new ItemModel();
		$this->cart = cart();
	}

	public function index()
	{
		//
	}

	public function addCart($id)
	{
		$item = $this->itmModel->getItem($id);
		print_r($item);
		$dataCart = array(
			'id' => $item['id'],
			'qty' => 1,
			'price' => $item['s_price'],
			'name' => $item['desc'],
			'option' => ''
		);
		$this->cart->insert($dataCart);
		//$data = $this->cart->contents();
		session()->setFlashdata("success", "Berhasil ditambahkan ke keranjang!!");
		return redirect()->to(site_url('/'));
	}

	public function displaycart()
	{
		$data['cartTotal'] = count($this->cart->contents());
		$data['cart'] = $this->cart->contents();
		return view('cart', $data);
	}

	public function removecart($data)
	{
		if ($data == 'all') {
			$this->cart->destroy();
		} else {
			$this->cart->remove($data);
		}
		return redirect()->to(site_url('/keranjang'));
	}

	public function updatecart()
	{
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array('rowid' => $rowid,
							'price' => $price,
							'amount' => $amount,
							'qty' => $qty);
			$this->cart->update($data);
		}
		session()->setFlashdata("success", "Update data suskes!!");
		return redirect()->to(site_url('/keranjang'));
	}
}
