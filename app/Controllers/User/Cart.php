<?php

// 1. UPDATE NAMESPACE: Sesuaikan dengan lokasi folder baru

namespace App\Controllers\User;

// 2. IMPORT BASECONTROLLER: Wajib ditambahkan
use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;

class Cart extends BaseController
{
    protected $produkModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->transaksiModel = new TransaksiModel();
    }

    // Menampilkan halaman keranjang
    public function index()
    {
        $data = [
            'title' => 'Keranjang Belanja',
            'cart' => session()->get('cart') ?? []
        ];

        // 3. UPDATE PATH VIEW: Arahkan ke folder user/shop/
        return view('user/shop/cart', $data);
    }

    // Menambah ke keranjang (Session)
    public function add()
    {
        // 4. UPDATE VARIABEL: Gunakan id_produk sesuai name input form dan primary key database
        $id_produk = $this->request->getPost('id_produk');
        $qty = $this->request->getPost('qty');

        $produk = $this->produkModel->find($id_produk);

        // Proteksi tambahan jika produk tidak valid
        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        if ($produk['stok'] < $qty) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        $cart = session()->get('cart') ?? [];

        // Jika produk sudah ada di keranjang, tambah qty-nya
        if (isset($cart[$id_produk])) {
            $cart[$id_produk]['qty'] += $qty;
        } else {
            // Gunakan id_produk sebagai key array agar mudah dihapus (unset)
            $cart[$id_produk] = [
                'id_produk' => $produk['id_produk'],
                'nama' => $produk['nama_produk'],
                'harga' => $produk['harga'],
                'qty' => $qty
            ];
        }

        session()->set('cart', $cart);
        return redirect()->to('/cart')->with('success', 'Produk ditambahkan ke keranjang.');
    }

    // Menghapus dari keranjang
    public function remove($id_produk)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id_produk])) {
            unset($cart[$id_produk]);
            session()->set('cart', $cart);
        }

        return redirect()->to('/cart')->with('success', 'Produk dihapus dari keranjang.');
    }

    // Proses Checkout & Potong Stok
    public function checkout()
    {
        $cart = session()->get('cart');
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Keranjang kosong!');
        }

        // 5. UPDATE FIELD: Sesuaikan dengan kolom TransaksiModel
        // Pastikan 'id_user' dan 'nama_user' sesuai dengan penamaan session login Anda
        $id_user = user_id();
        $nama_pelanggan = session()->get('nama_user') ?? 'Pelanggan Toko';

        $totalHarga = array_sum(array_map(function ($item) {
            return $item['harga'] * $item['qty'];
        }, $cart));

        $db = \Config\Database::connect();

        // Mulai Database Transaction (Sangat penting agar data konsisten)
        $db->transStart();

        // 1. Simpan ke tabel transaksi menggunakan field yang benar
        $this->transaksiModel->insert([
            'user_id' => $id_user,
            'nama_pelanggan' => $nama_pelanggan,
            'tanggal' => date('Y-m-d H:i:s'),
            'total' => $totalHarga,
            'status' => 'Selesai' // Status otomatis Selesai setelah checkout
        ]);
        $transaksiId = $this->transaksiModel->getInsertID();

        // 2. Simpan ke tabel transaksi_detail & kurangi stok
        $builderDetail = $db->table('transaksi_detail');
        foreach ($cart as $item) {
            $builderDetail->insert([
                'transaksi_id' => $transaksiId,
                'id_produk' => $item['id_produk'], // Sesuai migration TransaksiDetail
                'qty' => $item['qty'],
                'harga_satuan' => $item['harga']
            ]);

            // 3. Kurangi stok otomatis memanggil fungsi di ProdukModel
            $this->produkModel->kurangiStok($item['id_produk'], $item['qty']);
        }

        // Selesaikan Database Transaction
        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->to('/cart')->with('error', 'Gagal memproses checkout. Silakan coba lagi.');
        } else {
            session()->remove('cart'); // Kosongkan keranjang jika sukses
            return redirect()->to('/riwayat')->with('success', 'Checkout berhasil! Terima kasih telah berbelanja.');
        }
    }
}
