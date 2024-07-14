<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRekamMedisTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_rm' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
                'comment'    => 'Nomor Rekam Medis',
            ],
            'nama_pasien' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'tempat_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'nik_pasien' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
                'null' => true,
                'comment'    => 'Nomor NIK',
            ],
            'jenis_kelamin' => [
                'type'       => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'alamat_lengkap' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'diagnosa' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'dpjp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['inactive', 'active'],
                'default'    => 'active',
                'comment'    => 'Kalo kunjungan terakhirnya udah lebih dari 5 tahun itu inaktif mas, Kalo kunjungan terakhirnya belum lebih dari 5 tahun itu dikatakan aktif',
            ],
            'tanggal_kunjungan_terakhir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('rekam_medis');
    }

    public function down()
    {
        $this->forge->dropTable('rekam_medis');
    }
}
