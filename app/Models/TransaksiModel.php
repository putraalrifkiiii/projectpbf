<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

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

    /**
     * Riwayat transaksi berdasarkan user login
     */
    public function getRiwayatByUser($user_id)
    {
        return $this->where('user_id', $user_id)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Mengambil transaksi terbaru
     */
    public function getLatest()
    {
        return $this->orderBy('id', 'DESC')->findAll();
    }

    /**
     * Mengambil satu transaksi
     */
    public function getById($id)
    {
        return $this->find($id);
    }


    public function getTransaksiLengkap()
    {
        return $this->select('
            transaksi.*,
            pelanggan.nama_pelanggan,
            pelanggan.no_hp
        ')
            ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left')
            ->orderBy('transaksi.created_at', 'DESC')
            ->findAll();
    }
    public function getDetailTransaksi($id)
    {
        return $this->select('
            transaksi.*,
            pelanggan.nama_pelanggan AS nama_pelanggan_master,
            pelanggan.no_hp,
            pelanggan.alamat,
            users.username AS nama_kasir
        ')
            ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left')
            ->join('users', 'users.id = transaksi.user_id', 'left')
            ->where('transaksi.id', $id)
            ->first();
    }

    public function getItemTransaksi($id)
    {
        return $this->db->table('transaksi_detail')
            ->select('
            transaksi_detail.*,
            produk.nama_produk,
            produk.harga
        ')
            ->join('produk', 'produk.id_produk = transaksi_detail.id_produk', 'left')
            ->where('transaksi_detail.transaksi_id', $id)
            ->get()
            ->getResultArray();
    }
}
