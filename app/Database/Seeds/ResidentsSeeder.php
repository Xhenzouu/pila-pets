<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ResidentsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['first_name'=>'Juan','middle_name'=>null,'last_name'=>'Dela Cruz','barangay'=>'Linga, Pila, Laguna','contact_number'=>'09171112222','email'=>'juan@example.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Maria','middle_name'=>null,'last_name'=>'Santos','barangay'=>'Pinagbayanan, Pila, Laguna','contact_number'=>'09183334444','email'=>'maria.santos@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Jose','middle_name'=>null,'last_name'=>'Reyes','barangay'=>'Labuin, Pila, Laguna','contact_number'=>'09205556666','email'=>null,'created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Ana','middle_name'=>null,'last_name'=>'Lim','barangay'=>'Aplaya, Pila, Laguna','contact_number'=>'09397778888','email'=>'ana.lim@yahoo.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Pedro','middle_name'=>null,'last_name'=>'Garcia','barangay'=>'Bagong Pook, Pila, Laguna','contact_number'=>'09179990000','email'=>'pedro.garcia@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Luzviminda','middle_name'=>null,'last_name'=>'Tan','barangay'=>'Bulilan Sur, Pila, Laguna','contact_number'=>'09181234567','email'=>null,'created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Carlos','middle_name'=>null,'last_name'=>'Mendoza','barangay'=>'San Antonio, Pila, Laguna','contact_number'=>'09209876543','email'=>'carlos.mendoza@outlook.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Teresa','middle_name'=>null,'last_name'=>'Aquino','barangay'=>'Mojon, Pila, Laguna','contact_number'=>'09394567890','email'=>'teresa.aquino@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Ramon','middle_name'=>null,'last_name'=>'Fernandez','barangay'=>'Pansol, Pila, Laguna','contact_number'=>'09173210987','email'=>null,'created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Elena','middle_name'=>null,'last_name'=>'Ramos','barangay'=>'Tubuan, Pila, Laguna','contact_number'=>'09186543210','email'=>'elena.ramos@yahoo.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Miguel','middle_name'=>null,'last_name'=>'Torres','barangay'=>'Masico, Pila, Laguna','contact_number'=>'09201112222','email'=>'miguel.torres@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Sofia','middle_name'=>null,'last_name'=>'Cruz','barangay'=>'Santa Clara Norte, Pila, Laguna','contact_number'=>'09393334444','email'=>null,'created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Antonio','middle_name'=>null,'last_name'=>'Bautista','barangay'=>'Santa Clara Sur, Pila, Laguna','contact_number'=>'09175556666','email'=>'antonio.b@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Clara','middle_name'=>null,'last_name'=>'Villanueva','barangay'=>'Concepcion, Pila, Laguna','contact_number'=>'09187778888','email'=>'clara.v@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Roberto','middle_name'=>null,'last_name'=>'Domingo','barangay'=>'San Roque, Pila, Laguna','contact_number'=>'09209990000','email'=>null,'created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Isabella','middle_name'=>null,'last_name'=>'Castro','barangay'=>'Linga, Pila, Laguna','contact_number'=>'09391234567','email'=>'isabella.c@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Felipe','middle_name'=>null,'last_name'=>'Ortiz','barangay'=>'Pinagbayanan, Pila, Laguna','contact_number'=>'09179876543','email'=>'felipe.ortiz@yahoo.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Victoria','middle_name'=>null,'last_name'=>'Rivera','barangay'=>'Labuin, Pila, Laguna','contact_number'=>'09184567890','email'=>null,'created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Emilio','middle_name'=>null,'last_name'=>'Navarro','barangay'=>'Aplaya, Pila, Laguna','contact_number'=>'09203210987','email'=>'emilio.n@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Patricia','middle_name'=>null,'last_name'=>'Morales','barangay'=>'Bagong Pook, Pila, Laguna','contact_number'=>'09396543210','email'=>'patricia.m@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Ricardo','middle_name'=>null,'last_name'=>'Salazar','barangay'=>'Bulilan Sur, Pila, Laguna','contact_number'=>'09171113333','email'=>null,'created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Camille','middle_name'=>null,'last_name'=>'Herrera','barangay'=>'San Antonio, Pila, Laguna','contact_number'=>'09184445555','email'=>'camille.h@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Diego','middle_name'=>null,'last_name'=>'Pascual','barangay'=>'Mojon, Pila, Laguna','contact_number'=>'09206667777','email'=>'diego.p@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Lorena','middle_name'=>null,'last_name'=>'Vargas','barangay'=>'Pansol, Pila, Laguna','contact_number'=>'09398889999','email'=>null,'created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Gabriel','middle_name'=>null,'last_name'=>'Santos','barangay'=>'Tubuan, Pila, Laguna','contact_number'=>'09172223333','email'=>'gabriel.s@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Angelica','middle_name'=>null,'last_name'=>'Flores','barangay'=>'Masico, Pila, Laguna','contact_number'=>'09185556666','email'=>'angelica.f@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Marvin','middle_name'=>null,'last_name'=>'Lopez','barangay'=>'Santa Clara Norte, Pila, Laguna','contact_number'=>'09207778888','email'=>null,'created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Julia','middle_name'=>null,'last_name'=>'Gomez','barangay'=>'Santa Clara Sur, Pila, Laguna','contact_number'=>'09399990000','email'=>'julia.gomez@yahoo.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Eduardo','middle_name'=>null,'last_name'=>'Perez','barangay'=>'Concepcion, Pila, Laguna','contact_number'=>'09171239876','email'=>'eduardo.p@gmail.com','created_at'=>date('Y-m-d H:i:s')],
            ['first_name'=>'Rosa','middle_name'=>null,'last_name'=>'Martinez','barangay'=>'San Roque, Pila, Laguna','contact_number'=>'09184561234','email'=>'rosa.m@gmail.com','created_at'=>date('Y-m-d H:i:s')],
        ];

        $this->db->table('residents')->insertBatch($data);
    }
}
