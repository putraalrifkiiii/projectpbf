<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pelanggan',
            'pelanggan' => $this->pelangganModel->findAll(),
        ];

        return view('admin/pelanggan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pelanggan',
        ];

        return view('admin/pelanggan/create', $data);
    }

    public function store()
    {
        $this->pelangganModel->save([
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        return redirect()->to(base_url('admin/pelanggan'))
            ->with('pesan', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Pelanggan',
            'pelanggan' => $this->pelangganModel->find($id),
        ];

        return view('admin/pelanggan/edit', $data);
    }

    public function update($id)
    {
        $this->pelangganModel->update($id, [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        return redirect()->to(base_url('admin/pelanggan'))
            ->with('pesan', 'Data pelanggan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);

        return redirect()->to(base_url('admin/pelanggan'))
            ->with('pesan', 'Data pelanggan berhasil dihapus.');
    }
}
