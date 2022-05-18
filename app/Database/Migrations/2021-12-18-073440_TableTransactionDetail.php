<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableTransactionDetail extends Migration
{
	public function up()
	{
		//membuat kolom untuk table detail transaksi
		$this->forge->addField([
			'trd_no' => [
				'type' => 'char',
				'constraint' => '12',
			],
			'trd_type' => [
				'type' => 'enum',
				'constraint' => ['IB', 'OB'],
			],
			'trd_item' => [
				'type' => 'char',
				'constraint' => '15',
			],
			'trd_qty' => [
				'type' => 'double',
			],
			'trd_price' => [
				'type' => 'double',
			],
			'trd_total' => [
				'type' => 'double'
			]
		]);

		// Membuat tabel item
		$this->forge->createTable('tb_detail', TRUE);
	}

	public function down()
	{
		//hapus table detail transaksi
		$this->forge->dropTable('tb_detail');
	}
}
