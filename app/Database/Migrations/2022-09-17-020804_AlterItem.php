<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterItem extends Migration
{
	public function up()
	{
		$this->forge->addColumn('tb_item', [
			'img varchar(255)'
		]);
	}

	public function down()
	{
		$this->forge->dropColumn('tb_item', 'img');
	}
}
