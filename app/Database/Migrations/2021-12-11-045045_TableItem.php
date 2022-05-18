<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableItem extends Migration
{
	public function up()
	{
		//membuat kolom untuk table supplier
		$this->forge->addField([
			'id' => [
				'type' => 'char',
				'constraint' => '15',
			],
			'desc' => [
				'type' => 'varchar',
				'constraint' => '35',
			],
			'specs' => [
				'type' => 'varchar',
				'constraint' => '50',
			],
			'category' => [
				'type' => 'char',
				'constraint' => '8',
			],
			'unit' => [
				'type' => 'char',
				'constraint' => '5'	
			],
			'created_by' => [
				'type' => 'char',
				'constraint' => '8',
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel item
		$this->forge->createTable('tb_item', TRUE);
	}

	public function down()
	{
		//hapus table item
		$this->forge->dropTable('tb_supplier');
	}
}
