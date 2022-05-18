<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
	function __construct()
	{
		$this->user = new UserModel();
	}

	public function index()
	{
		return view('login');
	}

	public function auth()
	{
		$session = session();
		$user = $this->request->getPost('user');
		$pwd = $this->request->getPost('password');

		$cek = $this->user->getLogin($user);

		if (!$cek) {
			$session->setFlashdata('msg', 'User tidak terdaftar!!!');
			return redirect()->to('/');
		} else {
			$pass = $cek['password'];
			$verify = password_verify($pwd, $pass);
			if ($verify) {
				$ses_data = [
					'usrid'       => $cek['usrid'],
					'username'     => $cek['username'],
					'name'    => $cek['name'],
					'role'	=> $cek['role'],
					'logged_in'     => TRUE
				];
				$session->set($ses_data);
				return redirect()->to('/dashboard');
			} else {
				$session->setFlashdata('msg', 'Password anda salah');
				return redirect()->to('/');
			}
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/');
	}
}
