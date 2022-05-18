<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTrans extends Migration
{
	public function up()
	{
		//add column
		$this->forge->addColumn('tb_trans', [
			'tr_nilai float'
		]);
	}

	public function down()
	{
		//
		$this->forge->dropColumn('tb_trans', 'tr_nilai');
	}
}
