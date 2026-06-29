<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use App\Models\PelangganModel;
use App\Models\TransaksiDetailModel;

class Cart extends BaseController
{
    protected $produkModel;
    protected $transaksiModel;
    protected $pelangganModel;
    protected $transaksiDetailModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->transaksiModel = new TransaksiModel();
        $this->pelangganModel = new PelangganModel();
        $this->transaksiDetailModel = new TransaksiDetailModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Keranjang Belanja',
            'cart' => session()->get('cart') ?? []
        ];

        return view('user/shop/cart', $data);
    }

    public function add()
    {
        $id_produk = $this->request->getPost('id_produk');
        $qty = (int) $this->request->getPost('qty');

        $produk = $this->produkModel->find($id_produk);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        if ($qty <= 0) {
            return redirect()->back()->with('error', 'Jumlah produk tidak valid!');
        }

        if ($produk['stok'] < $qty) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$id_produk])) {
            $cart[$id_produk]['qty'] += $qty;
        } else {
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

    public function remove($id_produk)
    {
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$id_produk])) {
            unset($cart[$id_produk]);
            session()->set('cart', $cart);
        }

        return redirect()->to('/cart')->with('success', 'Produk dihapus dari keranjang.');
    }

    public function checkout()
    {
        $db = \Config\Database::connect();
        $db->transException(true);

        $cart = session()->get('cart');

        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Keranjang kosong!');
        }

        try {
            $midtransConfig = new \Config\Midtrans();

            \Midtrans\Config::$serverKey = $midtransConfig->serverKey;
            \Midtrans\Config::$isProduction = $midtransConfig->isProduction;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $user = user();

            if (!$user) {
                return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
            }

            $db->transBegin();

            $pelanggan = $this->pelangganModel
                ->where('nama_pelanggan', $user->username)
                ->first();

            if (!$pelanggan) {
                $this->pelangganModel->insert([
                    'nama_pelanggan' => $user->username,
                    'no_hp' => $user->no_hp ?? '-',
                    'alamat' => $user->alamat ?? '-',
                ]);

                $idPelanggan = $this->pelangganModel->insertID();
            } else {
                $idPelanggan = $pelanggan['id_pelanggan'];
            }

            $totalHarga = 0;
            $itemDetails = [];

            foreach ($cart as $item) {
                $produk = $this->produkModel->find($item['id_produk']);

                if (!$produk) {
                    throw new \Exception('Produk tidak ditemukan.');
                }

                if ((int) $item['qty'] > (int) $produk['stok']) {
                    throw new \Exception('Stok produk ' . $produk['nama_produk'] . ' tidak mencukupi.');
                }

                $subtotal = (int) $produk['harga'] * (int) $item['qty'];
                $totalHarga += $subtotal;

                $itemDetails[] = [
                    'id' => (string) $produk['id_produk'],
                    'price' => (int) $produk['harga'],
                    'quantity' => (int) $item['qty'],
                    'name' => $produk['nama_produk'],
                ];
            }

            $this->transaksiModel->insert([
                'user_id' => user_id(),
                'id_pelanggan' => $idPelanggan,
                'tanggal' => date('Y-m-d'),
                'total' => $totalHarga,
                'status' => 'Pending',
                'tipe_transaksi' => 'Online',
                'metode_pembayaran' => 'Midtrans',
            ]);

            $transaksiId = $this->transaksiModel->insertID();

            foreach ($cart as $item) {
                $produk = $this->produkModel->find($item['id_produk']);

                $this->transaksiDetailModel->insert([
                    'transaksi_id' => $transaksiId,
                    'id_produk' => $produk['id_produk'],
                    'qty' => $item['qty'],
                    'harga_satuan' => $produk['harga'],
                ]);
            }

            $orderId = 'TRX-' . $transaksiId;

            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $totalHarga,
                ],
                'customer_details' => [
                    'first_name' => $user->username,
                    'email' => $user->email,
                    'phone' => $user->no_hp ?? '',
                ],
                'item_details' => $itemDetails,
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $db->transCommit();

            $data = [
    'title' => 'Keranjang Belanja',
    'cart' => $cart,
    'snap_token' => $snapToken,
    'transaksi_id' => $transaksiId,
];

            return view('user/shop/cart', $data);

        } catch (\Throwable $e) {
            $db->transRollback();

            return redirect()->to('/cart')
                ->with('error', 'Checkout gagal: ' . $e->getMessage());
        }
    }

    public function success($transaksiId)
    {
        $db = \Config\Database::connect();

        $transaksi = $this->transaksiModel->find($transaksiId);

        if (!$transaksi) {
            return redirect()->to('/riwayat')
                ->with('error', 'Transaksi tidak ditemukan.');
        }

        if ($transaksi['status'] === 'Selesai') {
            session()->remove('cart');

            return redirect()->to('/riwayat')
                ->with('success', 'Transaksi sudah selesai.');
        }

        $items = $this->transaksiDetailModel
            ->where('transaksi_id', $transaksiId)
            ->findAll();

        if (empty($items)) {
            return redirect()->to('/riwayat')
                ->with('error', 'Detail transaksi tidak ditemukan.');
        }

        $db->transStart();

        $this->transaksiModel->update($transaksiId, [
            'status' => 'Selesai',
        ]);

        foreach ($items as $item) {
            $produk = $this->produkModel->find($item['id_produk']);

            if ($produk) {
                $stokBaru = (int) $produk['stok'] - (int) $item['qty'];

                $this->produkModel->update($item['id_produk'], [
                    'stok' => $stokBaru,
                ]);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->to('/riwayat')
                ->with('error', 'Sistem gagal memperbarui transaksi.');
        }

        session()->remove('cart');

        return redirect()->to('/riwayat')
            ->with('success', 'Pembayaran berhasil! Transaksi dan stok telah diupdate.');
    }

    public function notification()
    {
        $db = \Config\Database::connect();

        $midtransConfig = new \Config\Midtrans();

        \Midtrans\Config::$serverKey = $midtransConfig->serverKey;
        \Midtrans\Config::$isProduction = $midtransConfig->isProduction;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        try {
            $notif = new \Midtrans\Notification();

            $transactionStatus = $notif->transaction_status;
            $fraudStatus = $notif->fraud_status;
            $orderId = $notif->order_id;

            $transaksiId = str_replace('TRX-', '', $orderId);

            $transaksi = $this->transaksiModel->find($transaksiId);

            if (!$transaksi) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Transaksi tidak ditemukan'
                ]);
            }

            if ($transactionStatus == 'settlement' || ($transactionStatus == 'capture' && $fraudStatus == 'accept')) {

                if ($transaksi['status'] !== 'Selesai') {

                    $items = $this->transaksiDetailModel
                        ->where('transaksi_id', $transaksiId)
                        ->findAll();

                    $db->transStart();

                    $this->transaksiModel->update($transaksiId, [
                        'status' => 'Selesai',
                        'metode_pembayaran' => 'Midtrans - ' . strtoupper($notif->payment_type ?? 'Payment'),
                    ]);

                    foreach ($items as $item) {
                        $produk = $this->produkModel->find($item['id_produk']);

                        if ($produk) {
                            $stokBaru = (int) $produk['stok'] - (int) $item['qty'];

                            $this->produkModel->update($item['id_produk'], [
                                'stok' => $stokBaru,
                            ]);
                        }
                    }

                    $db->transComplete();
                }

            } elseif ($transactionStatus == 'pending') {

                $this->transaksiModel->update($transaksiId, [
                    'status' => 'Pending',
                ]);

            } elseif ($transactionStatus == 'expire') {

                $this->transaksiModel->update($transaksiId, [
                    'status' => 'Expired',
                ]);

            } elseif ($transactionStatus == 'cancel' || $transactionStatus == 'deny') {

                $this->transaksiModel->update($transaksiId, [
                    'status' => 'Dibatalkan',
                ]);
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Notification processed'
            ]);

        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
