<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_produk' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('id_produk', true);

        // Relasi (Foreign Key)
        $this->forge->addForeignKey('id_kategori', 'kategori', 'id_kategori', 'CASCADE', 'CASCADE');

        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
