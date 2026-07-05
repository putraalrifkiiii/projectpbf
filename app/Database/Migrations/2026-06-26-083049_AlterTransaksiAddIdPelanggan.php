<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTransaksiAddIdPelanggan extends Migration
{
    public function up()
    {
        // Tambah kolom id_pelanggan
        $this->forge->addColumn('transaksi', [
            'id_pelanggan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'id',
            ],
        ]);

        // Tambahkan index
        $this->forge->addKey('id_pelanggan');

        // Tambahkan foreign key
        $this->db->query("
            ALTER TABLE transaksi
            ADD CONSTRAINT fk_transaksi_pelanggan
            FOREIGN KEY (id_pelanggan)
            REFERENCES pelanggan(id_pelanggan)
            ON UPDATE CASCADE
            ON DELETE RESTRICT
        ");
    }

    public function down()
    {
        $this->db->query("
            ALTER TABLE transaksi
            DROP FOREIGN KEY fk_transaksi_pelanggan
        ");

        $this->forge->dropColumn('transaksi', 'id_pelanggan');
    }
}