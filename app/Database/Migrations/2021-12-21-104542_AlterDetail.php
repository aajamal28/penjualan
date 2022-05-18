<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterDetail extends Migration
{
	public function up()
	{
		//
		$this->forge->addColumn('tb_detail', [
			'trd_line INT(2)'
		]);
	}

	public function down()
	{
		//
		$this->forge->dropColumn('tb_detail', 'trd_line');
	}
}
