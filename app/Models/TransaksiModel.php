<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_pelanggan',
        'tanggal',
        'total',
        'status'
    ];

    protected $useTimestamps = true;
}