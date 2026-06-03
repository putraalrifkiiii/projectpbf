<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    protected $transaksi;

    public function __construct()
    {
        $this->transaksi = new TransaksiModel();
    }

    // Tampilkan data
    public function index()
    {
        $data = [
            'title' => 'Data Transaksi',
            'transaksi' => $this->transaksi->findAll()
        ];

        return view('transaksi/index', $data);
    }

    // Simpan data
    public function store()
    {
        $this->transaksi->save([
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'total' => $this->request->getPost('total'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/transaksi')
            ->with('pesan', 'Data transaksi berhasil ditambahkan');
    }

    // Form edit
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Transaksi',
            'transaksi' => $this->transaksi->find($id)
        ];

        return view('transaksi/edit', $data);
    }

    // Update
    public function update($id)
    {
        $this->transaksi->update($id, [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'total' => $this->request->getPost('total'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/transaksi')
            ->with('pesan', 'Data transaksi berhasil diupdate');
    }

    // Hapus
    public function delete($id)
    {
        $this->transaksi->delete($id);

        return redirect()->to('/transaksi')
            ->with('pesan', 'Data transaksi berhasil dihapus');
    }
}