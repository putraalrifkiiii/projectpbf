<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiDetailModel extends Model
{
    protected $table = 'transaksi_detail';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'transaksi_id',
        'id_produk',
        'qty',
        'harga_satuan',
    ];
}
