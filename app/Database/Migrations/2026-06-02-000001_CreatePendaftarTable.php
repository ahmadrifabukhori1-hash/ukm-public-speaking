<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendaftarTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'nim' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],
            'prodi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'semester' => [
                'type'       => 'INT',
                'constraint' => 2,
            ],
            'whatsapp' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 120,
            ],
            'pengalaman' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'alasan' => [
                'type' => 'TEXT',
            ],
            'jadwal_pilihan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'default'    => 'Menunggu Seleksi',
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
        $this->forge->createTable('pendaftar');
    }

    public function down()
    {
        $this->forge->dropTable('pendaftar');
    }
}