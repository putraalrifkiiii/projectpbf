<?php

namespace App\Controllers\Admin;

use App\Models\TransaksiModel;
use App\Controllers\BaseController;

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
            // Menambahkan orderBy agar transaksi terbaru (ID terbesar) muncul paling atas
            'transaksi' => $this->transaksi->orderBy('id', 'DESC')->findAll()
        ];

        return view('Admin/transaksi/index', $data);
    }

    // Simpan data (Jika Admin bisa menambah transaksi manual)
    public function store()
    {
        $this->transaksi->save([
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'total' => $this->request->getPost('total'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('admin/transaksi')
            ->with('success', 'Data transaksi berhasil ditambahkan!');
    }

    // Form edit
    public function edit($id)
    {
        $dataTransaksi = $this->transaksi->find($id);

        // Proteksi jika ada user/admin mengetik ID ngawur di URL
        if (empty($dataTransaksi)) {
            return redirect()->to('admin/transaksi')->with('error', 'Data transaksi tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Transaksi',
            'transaksi' => $dataTransaksi
        ];

        return view('Admin/transaksi/edit', $data);
    }

    // Update
    public function update($id)
    {
        // PERBAIKAN: Hanya update status saja karena form edit tidak mengirim nama/total
        $this->transaksi->update($id, [
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('admin/transaksi')
            ->with('success', 'Status transaksi berhasil diupdate!');
    }

    // Hapus
    public function delete($id)
    {
        // Pastikan datanya ada sebelum dihapus
        $dataTransaksi = $this->transaksi->find($id);

        if ($dataTransaksi) {
            $this->transaksi->delete($id);
            return redirect()->to('admin/transaksi')
                ->with('success', 'Data transaksi berhasil dihapus!');
        }

        // Kirim alert merah (error) jika gagal
        return redirect()->to('admin/transaksi')
            ->with('error', 'Gagal menghapus! Data tidak ditemukan.');
    }
}
