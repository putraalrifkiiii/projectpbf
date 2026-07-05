<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;

class Produk extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->produkModel   = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
    }

    // ===============================
    // Menampilkan Data Produk
    // ===============================
    public function index()
    {
        $data = [
            'title'     => 'Daftar Produk Elektronik',
            'produk'    => $this->produkModel->getProdukWithKategori(),
            'kategori'  => $this->kategoriModel->findAll()
        ];

        return view('Admin/produk/index', $data);
    }

    // ===============================
    // Form Tambah Produk
    // ===============================
    public function create()
    {
        $data = [
            'title'     => 'Tambah Produk',
            'kategori'  => $this->kategoriModel->findAll(),
            'validation'=> \Config\Services::validation()
        ];

        return view('Admin/produk/create', $data);
    }

    // ===============================
    // Simpan Produk
    // ===============================
    public function store()
    {
        $this->produkModel->save([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'id_kategori' => $this->request->getVar('id_kategori')
        ]);
        return redirect()->to('admin/produk')->with('pesan', 'Data produk berhasil ditambahkan.');
    }

    // ===============================
    // Form Edit
    // ===============================
    public function edit($id_produk)
    {
        $data = [
            'title'      => 'Edit Produk',
            'produk'     => $this->produkModel->find($id_produk),
            'kategori'   => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('Admin/produk/edit', $data);
    }

    // [UPDATE] Proses ubah data
    public function update($id_produk)
    {
        $this->produkModel->save([
            'id_produk' => $id_produk,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'id_kategori' => $this->request->getVar('id_kategori')
        ]);
        return redirect()->to('admin/produk')->with('pesan', 'Data produk berhasil diubah.');
    }

    // ===============================
    // Hapus Produk
    // ===============================
    public function delete($id_produk)
    {
        $this->produkModel->delete($id_produk);

        return redirect()->to('/admin/produk')
                         ->with('pesan', 'Data produk berhasil dihapus.');
    }
}