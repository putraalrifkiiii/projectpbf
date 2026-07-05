<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTransaksiTable extends Migration
{
    public function up()
    {
        // Tambah kolom baru
        $this->forge->addColumn('transaksi', [

            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'id',
            ],

            'tipe_transaksi' => [
                'type'       => 'ENUM',
                'constraint' => ['online', 'offline'],
                'default'    => 'online',
                'after'      => 'tanggal',
            ],

            'metode_pembayaran' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
                'after'      => 'tipe_transaksi',
            ],

        ]);

        // Tambahkan index
        $this->db->query("
            ALTER TABLE transaksi
            ADD INDEX idx_user_id (user_id)
        ");

        // Tambahkan foreign key
        $this->db->query("
            ALTER TABLE transaksi
            ADD CONSTRAINT fk_transaksi_user
            FOREIGN KEY (user_id)
            REFERENCES users(id)
            ON UPDATE CASCADE
            ON DELETE CASCADE
        ");
    }

    public function down()
    {
        // Hapus foreign key
        $this->db->query("
            ALTER TABLE transaksi
            DROP FOREIGN KEY fk_transaksi_user
        ");

        // Hapus index
        $this->db->query("
            ALTER TABLE transaksi
            DROP INDEX idx_user_id
        ");

        // Hapus kolom
        $this->forge->dropColumn('transaksi', [
            'user_id',
            'tipe_transaksi',
            'metode_pembayaran',
        ]);
    }
}