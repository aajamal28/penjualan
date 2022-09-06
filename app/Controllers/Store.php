<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Store extends BaseController
{
	public function index()
	{
		return view('store');
	}

	public function category($cat)
	{
		return view('store');
	}
}
