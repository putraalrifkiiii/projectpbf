<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class ShopController extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        // Inisialisasi model produk milikmu
        $this->produkModel = new ProdukModel();
    }

    // Menampilkan halaman katalog toko komputer untuk user
    public function index()
    {
        $data = [
            'title' => 'Katalog Toko Komputer',
            // Memanggil fungsi custom dari modelmu (mengambil semua produk beserta kategori)
            'produk' => $this->produkModel->getProdukWithKategori()
        ];

        return view('user/katalog', $data);
    }

    // Menampilkan halaman detail satu produk komputer (misal user klik salah satu produk)
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Produk',
            // Memanggil fungsi custom dengan melempar parameter ID produk
            'produk' => $this->produkModel->getProdukWithKategori($id)
        ];

        // Jika produk tidak ditemukan di database
        if (empty($data['produk'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Produk tidak ditemukan.');
        }

        return view('user/detail_produk', $data);
    }
}
