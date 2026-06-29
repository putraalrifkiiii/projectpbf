<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertDefaultGroups extends Migration
{
    public function up()
    {
        $builder = $this->db->table('auth_groups');

        // Admin
        $admin = $builder->where('name', 'admin')->get()->getRow();

        if (!$admin) {
            $builder->insert([
                'name' => 'admin',
                'description' => 'Administrator / Kasir'
            ]);
        }

        // User
        $user = $builder->where('name', 'user')->get()->getRow();

        if (!$user) {
            $builder->insert([
                'name' => 'user',
                'description' => 'Pelanggan Toko Online'
            ]);
        }
    }

    public function down()
    {
        $builder = $this->db->table('auth_groups');

        $builder->where('name', 'admin')->delete();
        $builder->where('name', 'user')->delete();
    }
}
