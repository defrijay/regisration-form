<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMerchTable extends Migration
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'nomor_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'status_mahasiswa' => [
                'type' => 'ENUM',
                'constraint' => ['Mahasiswa Aktif', 'Alumni']
            ],
            'kelas' => [
                'type' => 'ENUM',
                'constraint' => ['PILKOM A', 'PILKOM B', 'ILKOM C1', 'ILKOM C2'],
                'default' => 'PILKOM A'
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'produk_satuan' => [
                'type' => 'SET',
                'constraint' => [
                    'Jaket',
                    'Lanyard',
                    'Nametag',
                    'Mau Beli Bundle'
                ],
                'default' => 'Mau Beli Bundle'
            ],
            'paket_bundle' => [
                'type' => 'ENUM',
                'constraint' => [
                    'Ternary Bundle (Jaket + Lanyard + Nametag)',
                    'Binary Bundle (Jaket + Lanyard)',
                    'Mau Beli Satuan'
                ],
                'default' => 'Mau Beli Satuan',
            ],
            'size_jaket' => [
                'type' => 'ENUM',
                'constraint' => ['S', 'M', 'L', 'XL', '2XL', '3XL', '-'],
                'default' => '-'
            ],
            'desain_lanyard' => [
                'type' => 'ENUM',
                'constraint' => ['First Edition', 'Arunikarsa Edition', '-'],
                'default' => '-'
            ],
            'nametag' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'catatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'metode_pembayaran' => [
                'type' => 'ENUM',
                'constraint' => ['Transfer', 'COD', 'ShopeePay', 'Gopay'],
                'default' => 'Transfer'
            ],
            'pembayaran' => [
                'type' => 'ENUM',
                'constraint' => ['Lunas', 'Cicilan']
            ],
            'bukti_pembayaran' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],    
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('merch');
    }

    public function down()
    {
        $this->forge->dropTable('merch');
    }
}
