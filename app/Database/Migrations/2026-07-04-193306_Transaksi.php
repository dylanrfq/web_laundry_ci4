<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pelanggan_id' => [
    'type'       => 'INT',
    'constraint' => 11,
    'unsigned'   => true,
],
            'tanggal_transaksi' => [
                'type' => 'DATETIME',
            ],
            'total_bayar' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
            ],
            'created_at DATETIME NULL',
            'updated_at DATETIME NULL',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey(
            'pelanggan_id',
            'pelanggan',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}