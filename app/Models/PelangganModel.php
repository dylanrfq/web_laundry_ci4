<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table            = 'pelanggan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama', 'alamat', 'no_hp'];
    
    protected $useTimestamps    = true;
    
    // Mengaktifkan Soft Delete
    protected $useSoftDeletes   = true;
    protected $deletedField     = 'deleted_at';
}