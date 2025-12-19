<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('users')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'username' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'unique'     => true,
                ],
                'email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'unique'     => true,
                ],
                'role' => [
                    'type'       => 'ENUM',
                    'constraint' => ['admin', 'user'],
                    'default'    => 'user',
                ],
                'password' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                ],
                'resident_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                    'null'       => true,
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);
            $this->forge->addPrimaryKey('id');

            // Only add foreign key if residents table exists
            if ($this->db->tableExists('residents')) {
                $this->forge->addForeignKey('resident_id', 'residents', 'id', 'SET NULL', 'CASCADE');
            }

            $this->forge->createTable('users');
        }
    }

    public function down()
    {
        if ($this->db->tableExists('users')) {
            $this->forge->dropTable('users', true);
        }
    }
}