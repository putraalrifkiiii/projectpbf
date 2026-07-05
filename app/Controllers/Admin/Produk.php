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
        $rules = [
            'nama_produk' => 'required',
            'id_kategori' => 'required|integer',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        // Cek apakah kategori benar-benar ada
        $kategori = $this->kategoriModel
            ->where('id_kategori', $this->request->getPost('id_kategori'))
            ->first();

        if (!$kategori) {
            return redirect()->back()->withInput()->with('error', 'Kategori tidak ditemukan.');
        }

        $this->produkModel->insert([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok')
        ]);

        return redirect()->to('/admin/produk')
                         ->with('pesan', 'Data produk berhasil ditambahkan.');
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

    // ===============================
    // Update Produk
    // ===============================
    public function update($id_produk)
    {
        $rules = [
            'nama_produk' => 'required',
            'id_kategori' => 'required|integer',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->produkModel->update($id_produk, [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok')
        ]);

        return redirect()->to('/admin/produk')
                         ->with('pesan', 'Data produk berhasil diubah.');
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