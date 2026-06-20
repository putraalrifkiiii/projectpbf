<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
// Import config yang kita buat tadi
use Midtrans\Config;

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

    public function checkout()
    {
        $cart = session()->get('cart');
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Keranjang kosong!');
        }

        $totalHarga = array_sum(array_map(fn ($item) => $item['harga'] * $item['qty'], $cart));

        try {
            $midtransConfig = new \Config\Midtrans();
            \Midtrans\Config::$serverKey = $midtransConfig->serverKey;
            \Midtrans\Config::$isProduction = $midtransConfig->isProduction;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $order_id = 'ORD-' . time();
            $params = [
                'transaction_details' => ['order_id' => $order_id, 'gross_amount' => $totalHarga],
                'customer_details' => ['first_name' => user()->username, 'email' => user()->email],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $this->transaksiModel->insert([
                'user_id' => user_id(),
                'nama_pelanggan' => user()->username,
                'tanggal' => date('Y-m-d H:i:s'),
                'total' => $totalHarga,
                'status' => 'Pending'
            ]);

            // AMBIL ID TRANSAKSI YANG BARU SAJA DISIMPAN
            $transaksiId = $this->transaksiModel->getInsertID();

            // KEMBALIKAN KE VIEW CART DENGAN TOKEN
            $data = [
                'title' => 'Keranjang Belanja',
                'cart' => $cart,
                'snap_token' => $snapToken, // Token dikirim ke halaman cart
                'transaksi_id' => $transaksiId // <- Tambahkan baris ini
            ];

            return view('user/shop/cart', $data);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }

    // Fungsi untuk memproses pembayaran yang sukses
    public function success($transaksiId)
    {
        $cart = session()->get('cart');

        // Jika user me-refresh halaman sukses saat keranjang sudah kosong
        if (empty($cart)) {
            return redirect()->to('/riwayat');
        }

        $db = \Config\Database::connect();

        // Mulai Database Transaction agar data aman
        $db->transStart();

        // 1. Ubah status di tabel transaksi utama menjadi 'Selesai'
        $this->transaksiModel->update($transaksiId, [
            'status' => 'Selesai'
        ]);

        // 2. Simpan ke tabel transaksi_detail & kurangi stok
        $builderDetail = $db->table('transaksi_detail');
        foreach ($cart as $item) {
            $builderDetail->insert([
                'transaksi_id' => $transaksiId,
                'id_produk' => $item['id_produk'],
                'qty' => $item['qty'],
                'harga_satuan' => $item['harga']
            ]);

            // 3. Kurangi stok otomatis memanggil fungsi di ProdukModel
            $this->produkModel->kurangiStok($item['id_produk'], $item['qty']);
        }

        // Selesaikan Database Transaction
        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->to('/riwayat')->with('error', 'Sistem gagal menyimpan detail transaksi.');
        }

        // 4. Kosongkan session keranjang setelah sukses
        session()->remove('cart');

        return redirect()->to('/riwayat')->with('success', 'Pembayaran berhasil! Transaksi dan stok telah diupdate.');
    }
}
