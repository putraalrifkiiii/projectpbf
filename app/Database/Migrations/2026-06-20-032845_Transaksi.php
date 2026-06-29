<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [ // Sesuai allowedFields TransaksiModel
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true, // Bisa null jika admin input manual
            ],
            'nama_pelanggan' => [ // Fitur asli Anda
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tanggal' => [
                'type' => 'DATETIME',
            ],
            'total' => [ // Sesuai allowedFields TransaksiModel
                'type' => 'INT',
                'constraint' => 11,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'Pending',
            ],
            'created_at' => [ // Karena TransaksiModel useTimestamps = true
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('transaksi', true); // 'true' = IF NOT EXISTS
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
