<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TablePricelist extends Migration
{
	public function up()
	{
		//membuat kolom untuk table price list
		$this->forge->addField([
			'idpl' => [
				'type' => 'INT',
				'constraint' => '5',
				'unsigned'       => true,
				'auto_increment' => true
			],
			'itemid' => [
				'type' => 'char',
				'constraint' => '15',
			],
			'p_price' => [
				'type' => 'double',
			],
			's_price' => [
				'type' => 'double',
			],
			'start' => [
				'type' => 'datetime',
			],
			'expire' => [
				'type' => 'datetime',
			],
			'status' => [
				'type' => 'enum',
				'constraint' => ['0', '1'],
				'default' => '1',
			],
			'created_by' => [
				'type' => 'char',
				'constraint' => '8',
			],

		]);
		// Membuat primary key
		$this->forge->addKey('idpl', TRUE);

		// Membuat tabel item
		$this->forge->createTable('tb_pricelist', TRUE);
	}

	public function down()
	{
		//hapus table price list
		$this->forge->dropTable('tb_pricelist');
	}
}
