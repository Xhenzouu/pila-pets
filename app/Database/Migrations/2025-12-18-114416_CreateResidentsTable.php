<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateResidentsTable extends Migration
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
            'full_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'barangay' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'contact_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('residents');
    }

    public function down()
    {
        if ($this->db->tableExists('residents')) {
            $this->forge->dropTable('residents');
        }
    }
}