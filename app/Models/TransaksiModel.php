<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    protected $allowedFields = [
        'pelanggan_id',
        'tanggal_transaksi',
        'total_bayar'
    ];

    protected $useTimestamps = true;
}