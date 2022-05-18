<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table                = 'tb_user';
	protected $primaryKey           = 'usrid';
	protected $allowedFields        = ['usrid', 'username', 'name', 'role', 'password','created_at'];

	// Dates
	protected $createdField         = 'created_at';

	public function countData()
	{
		return $this->table($this->table)
			->countAllResults();
	}

	public function getUser($id = false)
	{
		if ($id === false) {
			return $this->table($this->table)
				->get()
				->getResultArray();
		} else {
			return $this->table($this->table)
				->where('usrid', $id)
				->get()
				->getRowArray();
		}
	}

	public function getLogin($user)
	{
		return $this->table($this->table)
				->where('username', $user)
				->get()
				->getRowArray();
	}

	public function insertUser($data)
	{
		return $this->table($this->table)->insert($data);
	}

	public function updateUser($data, $id)
	{
		return $this->db->table($this->table)->update($data, array('usrid' => $id));
	}
}
