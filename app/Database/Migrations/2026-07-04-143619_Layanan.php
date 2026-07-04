<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Layanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_layanan'   => ['type' => 'VARCHAR', 'constraint' => '100'],
            'harga'          => ['type' => 'INT', 'constraint' => 11],
            'satuan'         => ['type' => 'VARCHAR', 'constraint' => '50'],
            'estimasi_waktu' => ['type' => 'VARCHAR', 'constraint' => '50'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'     => ['type' => 'DATETIME', 'null' => true], // Kolom untuk Soft Delete
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('layanan');
    }

    public function down()
    {
        $this->forge->dropTable('layanan');
    }
}