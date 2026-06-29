<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\PelangganModel;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    protected $produkModel;
    protected $pelangganModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->pelangganModel = new PelangganModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $hariIni = date('Y-m-d');

        $totalPenjualan = $this->transaksiModel
            ->selectSum('total')
            ->first();

        $pendapatanHariIni = $this->transaksiModel
            ->selectSum('total')
            ->where('DATE(created_at)', $hariIni)
            ->first();

        $data = [
            'title' => 'Dashboard Admin',
            'totalProduk' => $this->produkModel->countAllResults(),
            'totalPelanggan' => $this->pelangganModel->countAllResults(),
            'totalTransaksi' => $this->transaksiModel->countAllResults(),
            'totalPenjualan' => $totalPenjualan['total'] ?? 0,
            'pendapatanHariIni' => $pendapatanHariIni['total'] ?? 0,
        ];

        return view('admin/dashboard/index', $data);
    }
}
