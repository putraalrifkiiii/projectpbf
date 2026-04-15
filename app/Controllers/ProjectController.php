<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\MahasiswaModel;

class ProjectController extends BaseController
{
    // 1. Menampilkan seluruh data (Contoh: Data Produk)
    public function tampilkanSemuaData()
    {
        $produkModel = new ProdukModel();
        // Menggunakan Query Builder / Model Bawaan CI4
        $data['semua_produk'] = $produkModel->findAll(); 
        
        return $this->response->setJSON($data);
    }

    // 2. Menampilkan data berdasarkan jenis/kategori
    public function tampilkanBerdasarkanJenis($id_kategori)
    {
        // PERBAIKAN: Gunakan ProdukModel langsung, bukan \Config\Database
        $produkModel = new ProdukModel();
        
        // Menampilkan produk yang kategorinya sesuai dengan parameter
        $data['produk_filter'] = $produkModel->where('id_kategori', $id_kategori)->findAll();
        
        return $this->response->setJSON($data);
    }

    // 3. Menambahkan minimal 1 data (Contoh: Data Produk Baru)
   // 3. Menambahkan minimal 1 data (Jalur Bypass Query Builder Murni)
    public function tambahData()
    {
        // Langsung tembak ke database tanpa lewat Model
        $db      = \Config\Database::connect();
        $builder = $db->table('produk');
        
        $dataBaru = [
            'id_kategori' => 4,
            'nama_produk' => 'Asus ROG Strix G15',
            'harga'       => 21000000,
            'stok'        => 9
        ];

        // Eksekusi insert
        $builder->insert($dataBaru);
        
        return "Berhasil nge-cheat! Data sudah masuk lewat Query Builder Murni.";
    }

    // 4. Tampilkan data mahasiswa beserta nama prodinya (Menggunakan JOIN)
    public function tampilkanMahasiswaProdi()
    {
        // PERBAIKAN UTAMA: Panggil MahasiswaModel di sini agar terpakai!
        $mahasiswaModel = new MahasiswaModel();
        
        // Memilih kolom yang ingin ditampilkan
        $mahasiswaModel->select('mahasiswa.nim, mahasiswa.nama_mahasiswa, prodi.nama_prodi');
        // Melakukan JOIN dengan tabel prodi
        $mahasiswaModel->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi');
        
        $data['mahasiswa_prodi'] = $mahasiswaModel->findAll();
        
        // Mengembalikan response dalam bentuk JSON agar mudah dilihat hasilnya
        return $this->response->setJSON($data);
    }
}