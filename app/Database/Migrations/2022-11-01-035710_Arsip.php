<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Arsip extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'nomor_surat'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 50,
                'null'           => false,
			],
			'id_kategori'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '10',
                'null'           => true,
			],
            'judul_surat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
                'null'           => true,
			],
            'tanggal_surat'       => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'file_surat'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '225',
                'null'           => true,
            ],
		]);

		// set Primary Key
		$this->forge->addKey('nomor_surat', TRUE);

		$this->forge->createTable('arsip', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('arsip');
    }
}
