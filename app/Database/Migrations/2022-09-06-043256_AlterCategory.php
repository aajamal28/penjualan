<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterCategory extends Migration
{
	public function up()
	{
		$this->forge->addColumn('tb_category', [
			'slug varchar(100)'
		]);
	}

	public function down()
	{
		$this->forge->dropColumn('tb_category', 'slug');
	}
}
