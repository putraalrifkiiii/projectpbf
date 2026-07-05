<?php

namespace App\Controllers\Admin;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Controllers\BaseController;

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
        return view('Admin/produk/index', $data);
    }

    // [CREATE] Form tambah data
    public function create()
    {
        $data = [
            'title' => 'Tambah Produk',
            'kategori' => $this->kategoriModel->findAll() // Kirim data kategori untuk dropdown
        ];
        return view('Admin/produk/create', $data);
    }

    // [CREATE] Proses simpan data
    public function store()
    {
        // 1. Ambil file gambar dari form
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = 'default.png'; // Nama default jika tidak ada gambar

        // 2. Cek apakah ada file yang diunggah
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            // Generate nama file acak agar unik
            $namaGambar = $fileGambar->getRandomName();
            // Pindahkan ke folder public/uploads
            $fileGambar->move('uploads', $namaGambar);
        }

        // 3. Simpan ke database beserta nama filenya
        $this->produkModel->save([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'gambar' => $namaGambar // Pastikan kolom 'gambar' ada di tabel database
        ]);

        return redirect()->to('admin/produk')->with('pesan', 'Data produk berhasil ditambahkan.');
    }

    // [UPDATE] Form edit data
    public function edit($id_produk)
    {
        $data = [
            'title' => 'Edit Produk',
            'produk' => $this->produkModel->find($id_produk),
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/produk/edit', $data);
    }

    // [UPDATE] Proses ubah data
    // [UPDATE] Proses ubah data
    public function update($id_produk)
    {
        // 1. Ambil data produk lama
        $produkLama = $this->produkModel->find($id_produk);

        // 2. Ambil file gambar dari form
        $fileGambar = $this->request->getFile('gambar');

        // 3. Logika penanganan gambar (Gunakan pengecekan !empty() atau isValid() pada objek)
        // Perbaikan: Tambahkan pengecekan if ($fileGambar && $fileGambar->isValid())
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {

            // Generate nama file baru
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads', $namaGambar);

            // Hapus gambar lama jika bukan default dan file benar-benar ada
            if (!empty($produkLama['gambar']) && $produkLama['gambar'] != 'default.png' && file_exists('uploads/' . $produkLama['gambar'])) {
                unlink('uploads/' . $produkLama['gambar']);
            }
        } else {
            // Jika tidak ada upload baru, gunakan gambar lama dari database
            $namaGambar = $produkLama['gambar'] ?? 'default.png';
        }

        // 4. Simpan perubahan
        $this->produkModel->save([
            'id_produk' => $id_produk,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('admin/produk')->with('pesan', 'Data produk berhasil diubah.');
    }

    // [DELETE] Proses hapus data
    public function delete($id_produk)
    {
        $this->produkModel->delete($id_produk);
        return redirect()->to('admin/produk')->with('pesan', 'Data produk berhasil dihapus.');
    }
}
