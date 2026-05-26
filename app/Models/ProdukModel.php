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
}
