<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_kategori'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 10,
                'null'           => false,
			],
			'nama_kategori'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
                'null'           => true,
			],
		]);

		// set Primary Key
		$this->forge->addKey('id_kategori', TRUE);

		$this->forge->createTable('kategori', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('kategori');
    }
}
