<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';

    // Menambahkan 'id_user' agar transaksi bisa dilacak per user untuk fitur Riwayat
    protected $allowedFields = [
        'user_id',
        'nama_pelanggan',
        'tanggal',
        'total',
        'status'
    ];

    // Karena true, pastikan tabel database Anda memiliki kolom 'created_at' dan 'updated_at'
    protected $useTimestamps = true;

    /**
     * Fungsi untuk mengambil riwayat transaksi khusus untuk user yang sedang login
     * * @param int $id_user
     * @return array
     */
    public function getRiwayatByUser($user_id)
    {
        return $this->where('user_id', $user_id)
                    ->orderBy('created_at', 'DESC') // Mengurutkan dari transaksi terbaru
                    ->findAll();
    }
}
