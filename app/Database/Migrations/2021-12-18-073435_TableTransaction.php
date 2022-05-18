<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableTransaction extends Migration
{
	public function up()
	{
		//membuat kolom untuk table transaksi
		$this->forge->addField([
			'tr_no' => [
				'type' => 'char',
				'constraint' => '12',
			],
			'tr_type' => [
				'type' => 'enum',
				'constraint' => ['IB', 'OB'],
			],
			'tr_date' => [
				'type' => 'date',
			],
			'tr_time' => [
				'type' => 'time',
			],
			'tr_doc' => [
				'type' => 'varchar',
				'constraint' => '35',
			],
			'tr_docdate' => [
				'type' => 'date'
			],
			'tr_splid' => [
				'type' => 'char',
				'constraint' => '8',
			],
			'tr_cust' => [
				'type' => 'varchar',
				'constraint' => '35',
			],
			'tr_total' => [
				'type' => 'double'
			],
			'tr_remark' => [
				'type' => 'varchar',
				'constraint' => '50',
			],
		]);

		// Membuat primary key
		$this->forge->addKey('tr_no', TRUE);

		// Membuat tabel item
		$this->forge->createTable('tb_trans', TRUE);
	}

	public function down()
	{
		//hapus table trans
		$this->forge->dropTable('tb_trans');
	}
}
