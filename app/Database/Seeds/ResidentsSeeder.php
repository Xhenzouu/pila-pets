<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ResidentsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['full_name' => 'Juan Dela Cruz', 'barangay' => 'Linga, Pila, Laguna', 'contact_number' => '09171112222', 'email' => 'juan@example.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Maria Santos', 'barangay' => 'Pinagbayanan, Pila, Laguna', 'contact_number' => '09183334444', 'email' => 'maria.santos@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Jose Reyes', 'barangay' => 'Labuin, Pila, Laguna', 'contact_number' => '09205556666', 'email' => null, 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Ana Lim', 'barangay' => 'Aplaya, Pila, Laguna', 'contact_number' => '09397778888', 'email' => 'ana.lim@yahoo.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Pedro Garcia', 'barangay' => 'Bagong Pook, Pila, Laguna', 'contact_number' => '09179990000', 'email' => 'pedro.garcia@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Luzviminda Tan', 'barangay' => 'Bulilan Sur, Pila, Laguna', 'contact_number' => '09181234567', 'email' => null, 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Carlos Mendoza', 'barangay' => 'San Antonio, Pila, Laguna', 'contact_number' => '09209876543', 'email' => 'carlos.mendoza@outlook.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Teresa Aquino', 'barangay' => 'Mojon, Pila, Laguna', 'contact_number' => '09394567890', 'email' => 'teresa.aquino@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Ramon Fernandez', 'barangay' => 'Pansol, Pila, Laguna', 'contact_number' => '09173210987', 'email' => null, 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Elena Ramos', 'barangay' => 'Tubuan, Pila, Laguna', 'contact_number' => '09186543210', 'email' => 'elena.ramos@yahoo.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Miguel Torres', 'barangay' => 'Masico, Pila, Laguna', 'contact_number' => '09201112222', 'email' => 'miguel.torres@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Sofia Cruz', 'barangay' => 'Santa Clara Norte, Pila, Laguna', 'contact_number' => '09393334444', 'email' => null, 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Antonio Bautista', 'barangay' => 'Santa Clara Sur, Pila, Laguna', 'contact_number' => '09175556666', 'email' => 'antonio.b@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Clara Villanueva', 'barangay' => 'Concepcion, Pila, Laguna', 'contact_number' => '09187778888', 'email' => 'clara.v@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Roberto Domingo', 'barangay' => 'San Roque, Pila, Laguna', 'contact_number' => '09209990000', 'email' => null, 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Isabella Castro', 'barangay' => 'Linga, Pila, Laguna', 'contact_number' => '09391234567', 'email' => 'isabella.c@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Felipe Ortiz', 'barangay' => 'Pinagbayanan, Pila, Laguna', 'contact_number' => '09179876543', 'email' => 'felipe.ortiz@yahoo.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Victoria Rivera', 'barangay' => 'Labuin, Pila, Laguna', 'contact_number' => '09184567890', 'email' => null, 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Emilio Navarro', 'barangay' => 'Aplaya, Pila, Laguna', 'contact_number' => '09203210987', 'email' => 'emilio.n@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Patricia Morales', 'barangay' => 'Bagong Pook, Pila, Laguna', 'contact_number' => '09396543210', 'email' => 'patricia.m@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Ricardo Salazar', 'barangay' => 'Bulilan Sur, Pila, Laguna', 'contact_number' => '09171113333', 'email' => null, 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Camille Herrera', 'barangay' => 'San Antonio, Pila, Laguna', 'contact_number' => '09184445555', 'email' => 'camille.h@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Diego Pascual', 'barangay' => 'Mojon, Pila, Laguna', 'contact_number' => '09206667777', 'email' => 'diego.p@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Lorena Vargas', 'barangay' => 'Pansol, Pila, Laguna', 'contact_number' => '09398889999', 'email' => null, 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Gabriel Santos', 'barangay' => 'Tubuan, Pila, Laguna', 'contact_number' => '09172223333', 'email' => 'gabriel.s@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Angelica Flores', 'barangay' => 'Masico, Pila, Laguna', 'contact_number' => '09185556666', 'email' => 'angelica.f@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Marvin Lopez', 'barangay' => 'Santa Clara Norte, Pila, Laguna', 'contact_number' => '09207778888', 'email' => null, 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Julia Gomez', 'barangay' => 'Santa Clara Sur, Pila, Laguna', 'contact_number' => '09399990000', 'email' => 'julia.gomez@yahoo.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Eduardo Perez', 'barangay' => 'Concepcion, Pila, Laguna', 'contact_number' => '09171239876', 'email' => 'eduardo.p@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
            ['full_name' => 'Rosa Martinez', 'barangay' => 'San Roque, Pila, Laguna', 'contact_number' => '09184561234', 'email' => 'rosa.m@gmail.com', 'created_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('residents')->insertBatch($data);
    }
}