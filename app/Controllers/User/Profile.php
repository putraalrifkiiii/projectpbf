<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Profil Saya'
        ];

        // PERBAIKAN: Huruf 'U' kapital disesuaikan dengan nama folder Anda
        return view('User/shop/profile/index', $data);
    }

    public function update()
    {
        // 1. Validasi input
        $rules = [
            // Username harus unik, kecuali milik user yang sedang login
            'username' => 'required|min_length[3]|max_length[30]|is_unique[users.username,id,' . user_id() . ']',
            'no_hp' => 'permit_empty|max_length[20]',
            'alamat' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            // PERBAIKAN TAMBAHAN: Mengambil pesan error spesifik agar lebih informatif
            $errorMsg = implode('<br>', $this->validator->getErrors());
            return redirect()->back()->withInput()->with('error', 'Gagal update profil:<br>' . $errorMsg);
        }

        // 2. Siapkan data yang akan diupdate
        $dataUpdate = [
            'username' => $this->request->getPost('username'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        // 3. Simpan ke tabel users menggunakan Query Builder
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', user_id());

        if ($builder->update($dataUpdate)) {
            return redirect()->to('/profil')->with('success', 'Profil Anda berhasil diperbarui!');
        } else {
            return redirect()->to('/profil')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}
