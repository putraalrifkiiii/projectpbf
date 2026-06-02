<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;

class Produk extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
    }

    // [READ] Menampilkan data
    public function index()
    {
        $data = [
            'title' => 'Daftar Produk Elektronik',
            'produk' => $this->produkModel->getProdukWithKategori(),
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('produk/index', $data);
    }

    // [CREATE] Form tambah data
    public function create()
    {
        $data = [
            'title' => 'Tambah Produk',
            'kategori' => $this->kategoriModel->findAll() // Kirim data kategori untuk dropdown
        ];
        return view('produk/create', $data);
    }

    // [CREATE] Proses simpan data
    public function store()
    {
        $this->produkModel->save([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'id_kategori' => $this->request->getVar('id_kategori')
        ]);
        return redirect()->to('/produk')->with('pesan', 'Data produk berhasil ditambahkan.');
    }

    // [UPDATE] Form edit data
    public function edit($id_produk)
    {
        $data = [
            'title' => 'Edit Produk',
            'produk' => $this->produkModel->find($id_produk),
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('produk/edit', $data);
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
        return redirect()->to('/produk')->with('pesan', 'Data produk berhasil diubah.');
    }

    // [DELETE] Proses hapus data
    public function delete($id_produk)
    {
        $this->produkModel->delete($id_produk);
        return redirect()->to('/produk')->with('pesan', 'Data produk berhasil dihapus.');
    }
}
