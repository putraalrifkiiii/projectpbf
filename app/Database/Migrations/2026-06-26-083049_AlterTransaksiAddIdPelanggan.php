<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTransaksiAddIdPelanggan extends Migration
{
    public function up()
    {
        // 1. Tambahkan kolom 'id_pelanggan'
        $this->forge->addColumn('transaksi', [
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true, // Dibuat true sementara agar tidak error jika sudah ada data lama
                'after' => 'user_id', // Posisinya diletakkan setelah user_id
            ],
        ]);

        // 2. Hapus kolom 'nama_pelanggan' yang lama
        $this->forge->dropColumn('transaksi', 'nama_pelanggan');

        // 3. Tambahkan relasi (Foreign Key) ke tabel pelanggan
        $this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id_pelanggan', 'CASCADE', 'RESTRICT');

        // Eksekusi penambahan Foreign Key pada tabel yang sudah ada
        $this->forge->processIndexes('transaksi');
    }

    public function down()
    {
        // Fungsi rollback jika terjadi kesalahan
        $this->forge->dropForeignKey('transaksi', 'transaksi_id_pelanggan_foreign');
        $this->forge->dropColumn('transaksi', 'id_pelanggan');

        $this->forge->addColumn('transaksi', [
            'nama_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'after' => 'user_id',
            ],
        ]);
    }
}
