<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$model = model('UserModel');
		$model->insert([
			'usrid' => uniqid(),
			'username' => 'admin',
			'name' => 'Administrator',
			'role' => 'AD',
			'password' => password_hash('password', PASSWORD_DEFAULT),
			'created_at' => date('Y-m-d H:i:s')
		]);		
	}
}
