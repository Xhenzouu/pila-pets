<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePetsTable extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('pets')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                ],
                'pet_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                ],
                'species' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
                ],
                'breed' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => true,
                ],
                'status' => [
                    'type'       => 'ENUM',
                    'constraint' => ['registered', 'lost', 'for_adoption'],
                    'default'    => 'registered',
                ],
                'description' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'image' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'location' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'contact_number' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 20,
                    'null'       => true,
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);
            $this->forge->addPrimaryKey('id');

            // Only add foreign key if users table exists
            if ($this->db->tableExists('users')) {
                $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
            }

            $this->forge->createTable('pets');
        }

        // Always run seeders (safe even if data exists — will just insert duplicates unless you truncate first)
        $seeder = \Config\Database::seeder();
        $seeder->call('ResidentsSeeder');
        $seeder->call('UsersSeeder');
        $seeder->call('PetsSeeder');
    }

    public function down()
    {
        if ($this->db->tableExists('pets')) {
            $this->forge->dropTable('pets', true);
        }
    }
}