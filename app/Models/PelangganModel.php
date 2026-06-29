<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'nama_pelanggan',
        'no_hp',
        'alamat',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
