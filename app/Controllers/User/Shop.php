<?php

// 1. UPDATE NAMESPACE: Sesuaikan dengan letak folder baru

namespace App\Controllers\User;

// 2. IMPORT BASECONTROLLER: Wajib ditambahkan karena BaseController ada di luar folder 'user'
use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;

class Shop extends BaseController
{
    protected $produkModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->transaksiModel = new TransaksiModel();
    }

    // Menampilkan daftar produk
    public function index()
    {
        $data = [
            'title' => 'Katalog Produk',
            // Memanggil method kustom Anda agar 'nama_kategori' ikut terambil
            'produk' => $this->produkModel->getProdukWithKategori()
        ];

        // 3. UPDATE PATH VIEW: Sesuaikan dengan folder baru
        return view('user/shop/index', $data);
    }

    // Menampilkan detail produk
    public function detail($id_produk)
    {
        $data = [
            'title' => 'Detail Produk',
            // Memanggil method kustom Anda dengan parameter ID
            'produk' => $this->produkModel->getProdukWithKategori($id_produk)
        ];

        // Proteksi: Jika produk tidak ditemukan di database, kembalikan ke halaman awal
        // Ini mencegah error "trying to access array offset on value of type null" di View
        if (empty($data['produk'])) {
            return redirect()->to('/')->with('error', 'Data produk tidak ditemukan!');
        }

        // 3. UPDATE PATH VIEW
        return view('user/shop/detail', $data);
    }

    // Melihat riwayat pesanan user
    public function riwayat()
    {
        // Menggunakan fungsi bawaan Myth\Auth untuk mengambil ID user yang login
        $userId = user_id();

        $data = [
            'title' => 'Riwayat Transaksi',
            // Perhatikan: 'id_user' sudah diubah menjadi 'user_id'
            'transaksi' => $this->transaksiModel->where('user_id', $userId)->findAll()
        ];

        // 3. UPDATE PATH VIEW
        return view('user/shop/history', $data);
    }
}
