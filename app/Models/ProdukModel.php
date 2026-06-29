<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['id_kategori', 'nama_produk', 'harga', 'stok'];

    // Fungsi untuk mengambil data produk beserta nama kategorinya
    public function getProdukWithKategori($id = false)
    {
        if ($id === false) {
            return $this->select('produk.*, kategori.nama_kategori')
                        ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
                        ->findAll();
        }

        return $this->select('produk.*, kategori.nama_kategori')
                    ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
                    ->where(['id_produk' => $id])
                    ->first();
    }

    /**
     * Fungsi baru untuk mengurangi stok produk otomatis setelah checkout berhasil.
     * Menggunakan Query Builder dengan parameter ketiga 'false' pada set()
     * agar CodeIgniter tidak menambahkan escape string pada operasi matematika (stok - qty).
     * * @param int $id_produk
     * @param int $qty
     */
    public function kurangiStok($id_produk, $qty)
    {
        return $this->builder()
                    ->set('stok', 'stok - ' . (int)$qty, false)
                    ->where('id_produk', $id_produk)
                    ->update();
    }
}
