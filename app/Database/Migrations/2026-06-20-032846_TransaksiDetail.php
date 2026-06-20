<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiDetail extends Migration
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
            'transaksi_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_produk' => [ // Disesuaikan dengan Primary Key ProdukModel Anda
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'harga_satuan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addKey('id', true);

        // Relasi Foreign Key
        $this->forge->addForeignKey('transaksi_id', 'transaksi', 'id', 'CASCADE', 'CASCADE');

        // Catatan: Jika id_produk di tabel 'produk' Anda tidak menggunakan atribut UNSIGNED,
        // baris di bawah ini mungkin akan error. Jika error, beri komentar (//) pada baris ini saja.
        // $this->forge->addForeignKey('id_produk', 'produk', 'id_produk', 'CASCADE', 'RESTRICT');

        $this->forge->createTable('transaksi_detail', true);
    }

    public function down()
    {
        $this->forge->dropTable('transaksi_detail');
    }
}
