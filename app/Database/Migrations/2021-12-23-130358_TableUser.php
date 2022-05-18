<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableUser extends Migration
{
	public function up()
	{
		//membuat kolom untuk table user
		$this->forge->addField([
			'usrid' => [
				'type' => 'char',
				'constraint' => '8',
			],
			'username' => [
				'type' => 'varchar',
				'constraint' => '35',
			],
			'name' => [
				'type' => 'varchar',
				'constraint' => '50',
			],
			'role' => [
				'type' => 'enum',
				'constraint' => ['AD','OP'],
			],
			'password' => [
				'type' => 'varchar',
				'constraint' => '200',
			],
			'created_at' => [
				'type' => 'datetime'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('usrid', TRUE);

		// Membuat tabel item
		$this->forge->createTable('tb_user', TRUE);
	}

	public function down()
	{
		//hapus table trans
		$this->forge->dropTable('tb_user');
	}
}
