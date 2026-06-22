<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // 1. Menambahkan grup 'admin' ke tabel auth_groups
        $groupData = [
            'name' => 'admin',
            'description' => 'Administrator System'
        ];

        // Cek dulu apakah grup admin sudah ada agar tidak error duplikat
        $existingGroup = $db->table('auth_groups')->where('name', 'admin')->get()->getRow();

        if (!$existingGroup) {
            $db->table('auth_groups')->insert($groupData);
            $groupId = $db->insertID();
            echo "Grup 'admin' berhasil dibuat!\n";
        } else {
            $groupId = $existingGroup->id;
            echo "Grup 'admin' sudah ada di database.\n";
        }

        // 2. Mengaitkan grup admin ke akun user kamu
        // PENTING: Ganti angka 1 di bawah ini dengan ID user kamu yang ada di tabel 'users'
        $userId = 1;

        $existingRelation = $db->table('auth_groups_users')
            ->where('group_id', $groupId)
            ->where('user_id', $userId)
            ->get()->getRow();

        if (!$existingRelation) {
            $db->table('auth_groups_users')->insert([
                'group_id' => $groupId,
                'user_id' => $userId
            ]);
            echo "User dengan ID {$userId} berhasil diangkat menjadi Admin!\n";
        } else {
            echo "User dengan ID {$userId} sudah menjadi Admin.\n";
        }
    }
}
