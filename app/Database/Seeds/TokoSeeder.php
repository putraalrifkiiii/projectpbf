<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TokoSeeder extends Seeder
{
    public function run()
    {
        // Data Kategori
        $dataKategori = [
            ['nama_kategori' => 'Laptop'],
            ['nama_kategori' => 'Smartphone'],
            ['nama_kategori' => 'Aksesoris']
        ];
        $this->db->table('kategori')->insertBatch($dataKategori);

        // Data Produk
        $dataProduk = [
            [
                'nama_produk' => 'Laptop Asus ROG',
                'id_kategori' => 1,
                'harga' => 20000000,
                'stok' => 5
            ],
            [
                'nama_produk' => 'iPhone 15 Pro',
                'id_kategori' => 2,
                'harga' => 18000000,
                'stok' => 10
            ],
            [
                'nama_produk' => 'Keyboard Mechanical',
                'id_kategori' => 3,
                'harga' => 500000,
                'stok' => 15
            ]
        ];
        $this->db->table('produk')->insertBatch($dataProduk);
    }
}
