<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = [
        'user_id',
        'id_pelanggan',
        'tanggal',
        'total',
        'status',
        'tipe_transaksi',
        'metode_pembayaran',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getRiwayatByUser($userId)
    {
        return $this->select('id, user_id, tanggal, total, status, created_at')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->findAll(50);
    }

    public function getLatest()
    {
        return $this->orderBy('id', 'DESC')
            ->findAll(50);
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function getTransaksiLengkap()
    {
        return $this->select([
                'transaksi.*',
                'pelanggan.nama_pelanggan',
                'pelanggan.no_hp',
            ])
            ->join(
                'pelanggan',
                'pelanggan.id_pelanggan = transaksi.id_pelanggan',
                'left'
            )
            ->orderBy('transaksi.created_at', 'DESC')
            ->findAll();
    }

    public function getDetailTransaksi($id)
{
    return $this->select([
            'transaksi.*',

            // Data akun user yang melakukan transaksi
            'users.username AS nama_user',
            'users.no_hp AS no_hp_user',
            'users.alamat AS alamat_user',
        ])
        ->join(
            'users',
            'users.id = transaksi.user_id',
            'left'
        )
        ->where('transaksi.id', $id)
        ->first();
}

    public function getItemTransaksi($id)
    {
        return $this->db
            ->table('transaksi_detail')
            ->select([
                'transaksi_detail.*',
                'produk.nama_produk',
                'produk.harga',
            ])
            ->join(
                'produk',
                'produk.id_produk = transaksi_detail.id_produk',
                'left'
            )
            ->where('transaksi_detail.transaksi_id', $id)
            ->get()
            ->getResultArray();
    }
}