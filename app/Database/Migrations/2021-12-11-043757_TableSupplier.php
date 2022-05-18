<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableSupplier extends Migration
{
	public function up()
	{
		//membuat kolom untuk table supplier
		$this->forge->addField([
			'idspl' => [
				'type' => 'char',
				'constraint' => '8',
			],
			'name' => [
				'type' => 'varchar',
				'constraint' => '35',
			],
			'address' => [
				'type' => 'varchar',
				'constraint' => '50',
			],
			'telp' => [
				'type' => 'varchar',
				'constraint' => '15',
			],
			'created_by' => [
				'type' => 'char',
				'constraint' => '8',
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel supplier
		$this->forge->createTable('tb_supplier', TRUE);
	}

	public function down()
	{
		//hapus table supplier
		$this->forge->dropTable('tb_supplier');
	}
}
