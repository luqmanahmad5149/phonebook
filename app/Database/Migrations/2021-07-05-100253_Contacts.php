<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contacts extends Migration
{
	public function up()
	{
		$this->forge->addField([
				'id'          => [
						'type'           => 'INT',
						'constraint'     => 5,
						'unsigned'       => true,
						'auto_increment' => true,
				],
				'name'       => [
						'type'       => 'VARCHAR',
						'constraint' => '255',
				],
				'contact' => [
						'type' => 'VARCHAR',
						'constraint' => '255',
				],
				'created_at' => [
						'type' => 'DATETIME',
						'null' => 'TRUE',
				],
				'updated_at' => [
						'type' => 'DATETIME',
						'null' => 'TRUE',
				]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('contacts');
	}

	public function down()
	{
		$this->forge->dropTable('contacts');
	}
}
