<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableCategory extends Migration
{
	public function up()
	{
		//membuat kolom untuk tabel category
		$this->forge->addField([
			'idcat' => [
				'type' => 'char',
				'constraint' => '8',
			],
			'category' => [
				'type' => 'varchar',
				'constraint' => '25',
			],
			'created_by' => [
				'type' => 'char',
				'constraint' => '8',
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel category
		$this->forge->createTable('tb_category', TRUE);
	}

	public function down()
	{
		//hapus tabel
		$this->forge->dropTable('tb_category');
	}
}
