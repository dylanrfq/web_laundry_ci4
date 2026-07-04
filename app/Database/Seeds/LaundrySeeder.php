<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LaundrySeeder extends Seeder
{
    public function run()
    {
        // Data Awal Layanan
        $dataLayanan = [
            [
                'nama_layanan'   => 'Cuci Komplit',
                'harga'          => 6000,
                'satuan'         => 'Kg',
                'estimasi_waktu' => '2 Hari',
                'created_at'     => Time::now()
            ],
            [
                'nama_layanan'   => 'Cuci Karpet',
                'harga'          => 15000,
                'satuan'         => 'Meter',
                'estimasi_waktu' => '3 Hari',
                'created_at'     => Time::now()
            ]
        ];

        // Data Awal Pelanggan
        $dataPelanggan = [
            [
                'nama'       => 'Dylan Rifqi Alfaizi',
                'alamat'     => 'Jl. Nakula 1, Semarang',
                'no_hp'      => '081234567890',
                'created_at' => Time::now()
            ]
        ];

        // Data Awal User (Untuk Login) - Password di-hash menggunakan password_hash()
        $dataUser = [
            [
                'username'   => 'admin',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'created_at' => Time::now()
            ]
        ];

        // Insert ke database
        $this->db->table('layanan')->insertBatch($dataLayanan);
        $this->db->table('pelanggan')->insertBatch($dataPelanggan);
        $this->db->table('users')->insertBatch($dataUser);
    }
}