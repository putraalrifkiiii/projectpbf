<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGambarToProduk extends Migration
{
    public function up()
    {
        // Menambahkan kolom 'gambar' setelah kolom 'stok'
        $fields = [
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'stok' // Meletakkan kolom baru tepat setelah kolom stok
            ],
        ];

        $this->forge->addColumn('produk', $fields);
    }

    public function down()
    {
        // Perintah untuk menghapus kembali kolom 'gambar' jika dilakukan rollback
        $this->forge->dropColumn('produk', 'gambar');
    }
}
