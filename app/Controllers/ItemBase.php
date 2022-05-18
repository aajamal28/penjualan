<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\SupplierModel;
use App\Models\ItemModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ItemBase extends BaseController
{
	function __construct()
	{
		$this->cat = new CategoryModel();
		$this->spl = new SupplierModel();
		$this->item = new ItemModel();
		$this->user = new UserModel();
		$this->session = session();
	}

	public function index()
	{
		//
	}

	public function category()
	{
		$data['category'] = $this->cat->getCategory();
		$data['user'] = $this->session->get('name');
		return view('master/v_category', $data);
	}

	public function add_category()
	{
		$post = $this->request->getPost();
		$data = [
			'idcat' => uniqid(),
			'category' => $post['category'],
			'created_by' => $this->session->get('name'),
		];

		$this->cat->insertCategory($data);
		session()->setFlashdata('success', 'Register kategori berhasil!!!');
		return redirect()->to(site_url('/master/kategori/'));
	}

	public function delete_category($id)
	{
		$cat = new CategoryModel();
		$cat->delete($id);
		session()->setFlashdata('success', 'Delete kategori berhasil!!!');
		return redirect()->to(site_url('/master/kategori/'));
	}

	public function supplier()
	{
		$data['supplier'] = $this->spl->getSupplier();
		return view('master/v_supplier', $data);
	}

	public function add_supplier()
	{
		return view('master/form_supplier');
	}

	public function save_supplier()
	{
		$post = $this->request->getPost();
		$cek = $this->spl->getSupplier($post['splId']);

		if (!$cek) {
			$data = [
				'idspl' => $post['splId'],
				'name' => $post['splName'],
				'address' => $post['splAdr'],
				'telp' => $post['splTelp'],
				'created_by' => $post['splBy']
			];

			$this->spl->insertSupplier($data);
			session()->setFlashdata('success', 'Register Supplier berhasil!!!');
			return redirect()->to(site_url('/master/supplier/'));
		} else {
			$data = [
				'name' => $post['splName'],
				'address' => $post['splAdr'],
				'telp' => $post['splTelp'],
			];

			$this->spl->updateSupplier($data, $post['splId']);
			session()->setFlashdata('success', 'Update Supplier berhasil!!!');
			return redirect()->to(site_url('/master/supplier/'));
		}
	}

	public function detail_supplier($id)
	{
		$data['supplier'] = $this->spl->getSupplier($id);

		if (!$data['supplier']) {
			throw PageNotFoundException::forPageNotFound();
		}
		return view('master/form_supplier', $data);
	}

	public function item()
	{
		$data['item'] = $this->item->getItem();
		return view('master/v_item', $data);
	}

	public function add_item()
	{
		$data['category'] = $this->cat->getCategory();
		return view('master/form_item', $data);
	}

	public function save_item()
	{
		$post = $this->request->getPost();
		$cek = $this->item->getItem($post['itemId']);

		if (!$cek) {
			$data = [
				'id' => $post['itemId'],
				'desc' => $post['itemDesc'],
				'specs' => $post['itemSpecs'],
				'category' => $post['itemCat'],
				'unit' => $post['itemUnit'],
				'created_by' => $post['itemBy']
			];

			$this->item->insertItem($data);
			session()->setFlashdata('success', 'Register Barang berhasil!!!');
			return redirect()->to(site_url('/master/barang/'));
		} else {
			$data = [
				'desc' => $post['itemDesc'],
				'specs' => $post['itemSpecs'],
				'category' => $post['itemCat'],
				'unit' => $post['itemUnit']
			];

			$this->item->updateItem($data, $post['itemId']);
			session()->setFlashdata('success', 'Update Barang berhasil!!!');
			return redirect()->to(site_url('/master/barang/'));
		}
	}

	public function detail_item($id)
	{
		$data['item'] = $this->item->getItem($id);
		$data['category'] = $this->cat->getCategory();

		if (!$data['item']) {
			throw PageNotFoundException::forPageNotFound();
		}
		return view('master/form_item', $data);
	}

	public function user()
	{
		$data['user'] = $this->user->getUser();
		return view('master/v_user', $data);
	}

	public function add_user()
	{
		return view('master/form_user');
	}

	public function save_user()
	{
		$post = $this->request->getPost();
		$cek = $this->user->getUser($post['usrid']);

		if (!$cek) {
			$data = [
				'usrid' => $post['usrid'],
				'username' => $post['usrlogin'],
				'name' => $post['usrname'],
				'role' => $post['usrrole'],
				'password' => password_hash($post['usrpwd'], PASSWORD_DEFAULT),
				'created_at' => $post['usrdate']
			];

			$this->user->insertUser($data);
			session()->setFlashdata('success', 'Register User berhasil!!!');
			return redirect()->to(site_url('/master/user/'));
		} else {
			$data = [
				'username' => $post['usrlogin'],
				'name' => $post['usrname'],
				'role' => $post['usrrole'],
				'password' => password_hash($post['usrpwd'], PASSWORD_DEFAULT),
			];

			$this->user->updateUser($data, $post['usrid']);
			session()->setFlashdata('success', 'Update User berhasil!!!');
			return redirect()->to(site_url('/master/user/'));
		}
	}

	public function detail_user($id)
	{
		$data['user'] = $this->user->getUser($id);

		if (!$data['user']) {
			throw PageNotFoundException::forPageNotFound();
		}
		return view('master/form_user', $data);
	}
}
