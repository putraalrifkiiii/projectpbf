<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use Throwable;

class Shop extends BaseController
{
    protected ProdukModel $produkModel;
    

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        return view('user/shop/index', [
            'title' => 'Katalog Produk',
            'produk' => $this->produkModel->getProdukWithKategori(),
        ]);
    }

    public function detail($idProduk)
    {
        $produk = $this->produkModel->getProdukWithKategori($idProduk);

        if (empty($produk)) {
            return redirect()
                ->to('/')
                ->with('error', 'Data produk tidak ditemukan!');
        }

        return view('user/shop/detail', [
            'title' => 'Detail Produk',
            'produk' => $produk,
        ]);
    }

    public function riwayat()
    {
        $userId = user_id();

        if (empty($userId)) {
            return redirect()
                ->to('/login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        try {
            $transaksiModel = new TransaksiModel();

            return view('user/shop/history', [
                'title' => 'Riwayat Transaksi',
                'transaksi' => $transaksiModel
                    ->getRiwayatByUser((int) $userId),
                'errorDb' => null,
            ]);
        } catch (Throwable $e) {
            log_message(
                'error',
                'Riwayat transaksi gagal untuk user ' .
                $userId . ': ' . $e->getMessage()
            );

            return view('user/shop/history', [
                'title' => 'Riwayat Transaksi',
                'transaksi' => [],
                'errorDb' => 'Riwayat transaksi gagal dimuat. Periksa koneksi MySQL.',
            ]);
        }
    }

 public function invoice($id)
{
    $transaksiModel = new TransaksiModel();

    $transaksi = $transaksiModel->getDetailTransaksi($id);

    if (
        !$transaksi
        || (int) $transaksi['user_id'] !== (int) user_id()
    ) {
        return redirect()
            ->to(base_url('riwayat'))
            ->with('error', 'Invoice tidak ditemukan atau bukan milik Anda.');
    }

    $items = $transaksiModel->getItemTransaksi($id);

    return view('Admin/transaksi/invoice', [
        'title' => 'Invoice',
        'transaksi' => $transaksi,
        'items' => $items,
    ]);
}

    
}