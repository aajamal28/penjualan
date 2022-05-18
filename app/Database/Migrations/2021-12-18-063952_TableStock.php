<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableStock extends Migration
{
	public function up()
	{
		//membuat kolom untuk table price list
		$this->forge->addField([
			'idstk' => [
				'type' => 'INT',
				'constraint' => '5',
				'unsigned'       => true,
				'auto_increment' => true
			],
			'itemid' => [
				'type' => 'char',
				'constraint' => '15',
			],
			'stock' => [
				'type' => 'double',
			],
			'date' => [
				'type' => 'datetime',
			],
		]);
		// Membuat primary key
		$this->forge->addKey('idstk', TRUE);

		// Membuat tabel item
		$this->forge->createTable('tb_stock', TRUE);
	}

	public function down()
	{
		//hapus table price list
		$this->forge->dropTable('tb_stock');
	}
}
