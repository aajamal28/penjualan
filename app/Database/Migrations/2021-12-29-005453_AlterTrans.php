<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTrans extends Migration
{
	public function up()
	{
		//
		$this->forge->addColumn('tb_trans', [
			'tr_user char(8)'
		]);
	}

	public function down()
	{
		//
		$this->forge->dropColumn('tb_trans', 'tr_user');
	}
}
