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
            'username' => 'required|min_length[3]|max_length[30]|is_unique[users.username,id,' . user_id() . ']',
            'no_hp'    => 'permit_empty|max_length[20]',
            'alamat'   => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            $errorMsg = implode('<br>', $this->validator->getErrors());
            return redirect()->back()->withInput()->with('error', 'Gagal update profil:<br>' . $errorMsg);
        }

        // 2. Ambil data dari Form
        $username = $this->request->getPost('username');
        $no_hp    = $this->request->getPost('no_hp');
        $alamat   = $this->request->getPost('alamat');
        $userId   = user_id();

        // 3. Simpan Menggunakan RAW SQL QUERY (Anti Siluman/Anti Nyasar)
        $db = \Config\Database::connect();
        $sql = "UPDATE users SET username = ?, no_hp = ?, alamat = ? WHERE id = ?";
        
        if ($db->query($sql, [$username, $no_hp, $alamat, $userId])) {
            return redirect()->to('/profil')->with('success', 'Profil Anda berhasil diperbarui!');
        } else {
            return redirect()->to('/profil')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}