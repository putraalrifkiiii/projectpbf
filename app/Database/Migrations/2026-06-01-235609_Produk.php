<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        // Cek jika table belum ada
        if (!$this->db->tableExists('produk')) {

            $this->forge->addField([

                'id_produk' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],

                'nama_produk' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 150,
                ],

                'id_kategori' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                ],

                'harga' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                ],

                'stok' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                ],

                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],

                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],

            ]);

            // Primary Key
            $this->forge->addKey('id_produk', true);

            // Foreign Key
            $this->forge->addForeignKey(
                'id_kategori',
                'kategori',
                'id_kategori',
                'CASCADE',
                'CASCADE'
            );

            // Create Table
            $this->forge->createTable('produk', true);
        }
    }

    public function down()
    {
        // Drop table jika ada
        $this->forge->dropTable('produk', true);
    }
}