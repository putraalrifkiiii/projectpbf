<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('transaksi')) {

            $this->forge->addField([

                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],

                'nama_pelanggan' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                ],

                'tanggal' => [
                    'type' => 'DATE',
                ],

                'total' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                ],

                'status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
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

            $this->forge->addKey('id', true);

            $this->forge->createTable('transaksi');
        }
    }

    public function down()
    {
        $this->forge->dropTable('transaksi', true);
    }
}