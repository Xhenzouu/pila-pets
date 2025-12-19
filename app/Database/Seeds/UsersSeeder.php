<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Admin (no resident link)
            [
                'username'    => 'admin',
                'email'       => 'admin@pilapets.com',
                'role'        => 'admin',
                'password'    => password_hash('admin123', PASSWORD_DEFAULT),
                'resident_id' => null,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            // Resident users linked to actual residents
            [
                'username'    => 'juan',
                'email'       => 'juan@example.com',
                'role'        => 'user',
                'password'    => password_hash('juan123', PASSWORD_DEFAULT),
                'resident_id' => 1, // Juan Dela Cruz
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'username'    => 'maria',
                'email'       => 'maria.santos@gmail.com',
                'role'        => 'user',
                'password'    => password_hash('maria123', PASSWORD_DEFAULT),
                'resident_id' => 2, // Maria Santos
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'username'    => 'ana',
                'email'       => 'ana.lim@yahoo.com',
                'role'        => 'user',
                'password'    => password_hash('ana123', PASSWORD_DEFAULT),
                'resident_id' => 4, // Ana Lim
                'created_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}