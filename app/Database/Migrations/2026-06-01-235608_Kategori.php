<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        // Cek jika table belum ada
        if (!$this->db->tableExists('kategori')) {

            $this->forge->addField([
                'id_kategori' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],

                'nama_kategori' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                ],
            ]);

            $this->forge->addKey('id_kategori', true);

            // true = IF NOT EXISTS
            $this->forge->createTable('kategori', true);
        }
    }

    public function down()
    {
        // true = DROP TABLE IF EXISTS
        $this->forge->dropTable('kategori', true);
    }
}