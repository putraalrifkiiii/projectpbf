<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'          => 1,
                'name'        => 'admin',
                'description' => 'Administrator System',
            ],
            [
                'id'          => 2,
                'name'        => 'user',
                'description' => 'Pelanggan Toko Online',
            ],
        ];

        $this->db->table('auth_groups')->insertBatch($data);
    }
}
