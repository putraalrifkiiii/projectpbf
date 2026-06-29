<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOmnichannelFieldsToTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addColumn('transaksi', [

            'tipe_transaksi' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
                'after' => 'status',
            ],

            'metode_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
                'after' => 'tipe_transaksi',
            ],

        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('transaksi', 'tipe_transaksi');
        $this->forge->dropColumn('transaksi', 'metode_pembayaran');
    }
}
