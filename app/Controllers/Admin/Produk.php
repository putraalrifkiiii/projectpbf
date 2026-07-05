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
            'title'      => 'Tambah Produk',
            'kategori'   => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('Admin/produk/create', $data);
    }

    // ===============================
    // Simpan Produk
    // ===============================
    public function store()
    {
        $gambar = $this->request->getFile('gambar');

        $namaGambar = 'default.png';

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move(FCPATH . 'uploads/produk', $namaGambar);
        }

        $this->produkModel->save([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'gambar'      => $namaGambar
        ]);

        return redirect()->to('/admin/produk')
            ->with('pesan', 'Produk berhasil ditambahkan.');
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
        $produk = $this->produkModel->find($id_produk);

        $gambar = $this->request->getFile('gambar');

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {

            $namaGambar = $gambar->getRandomName();

            $gambar->move(FCPATH . 'uploads/produk', $namaGambar);

            if (
                !empty($produk['gambar']) &&
                $produk['gambar'] != 'default.png' &&
                file_exists(FCPATH . 'uploads/produk/' . $produk['gambar'])
            ) {
                unlink(FCPATH . 'uploads/produk/' . $produk['gambar']);
            }

        } else {

            $namaGambar = $produk['gambar'];

        }

        $this->produkModel->save([
            'id_produk'   => $id_produk,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'gambar'      => $namaGambar
        ]);

        return redirect()->to('/admin/produk')
            ->with('pesan', 'Produk berhasil diperbarui.');
    }

    // ===============================
    // Hapus Produk
    // ===============================
    public function delete($id_produk)
    {
        $produk = $this->produkModel->find($id_produk);

        if (
            !empty($produk['gambar']) &&
            $produk['gambar'] != 'default.png' &&
            file_exists(FCPATH . 'uploads/produk/' . $produk['gambar'])
        ) {
            unlink(FCPATH . 'uploads/produk/' . $produk['gambar']);
        }

        $this->produkModel->delete($id_produk);

        return redirect()->to('/admin/produk')
            ->with('pesan', 'Produk berhasil dihapus.');
    }
}