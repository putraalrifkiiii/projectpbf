<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsUsersSeeder extends Seeder
{
    public function run()
    {
        $table = $this->db->table('auth_groups_users');

        // Hapus semua relasi group lama
        $table->truncate();

        // Tambahkan relasi baru
        $table->insertBatch([
            [
                'group_id' => 1,
                'user_id'  => 1,
            ],
            [
                'group_id' => 2,
                'user_id'  => 2,
            ],
        ]);
    }
}