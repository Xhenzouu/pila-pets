<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PetsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id'        => 1,
                'pet_name'       => 'Max',
                'species'        => 'Dog',
                'breed'          => 'Labrador Retriever',
                'status'         => 'registered',
                'description'    => 'Friendly and energetic Labrador. Loves playing fetch in the parks around Pila.',
                'image'          => 'https://i.pinimg.com/736x/4b/43/b6/4b43b69aab81968ffbc382433908028b.jpg', // Local Laguna Labrador
                'location'       => 'Linga, Pila, Laguna',
                'contact_number' => '0917-123-4567',
                'is_approved'    => 1,
                'created_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'user_id'        => 1,
                'pet_name'       => 'Luna',
                'species'        => 'Cat',
                'breed'          => 'Persian',
                'status'         => 'lost',
                'description'    => 'Fluffy white Persian cat. Last seen near the church area in Pinagbayanan.',
                'image'          => 'https://cdn.royalcanin-weshare-online.io/POfV93oBaPOZra8qKLgT/v3/bp-lot-1-persan-human', // Beautiful Persian
                'location'       => 'Pinagbayanan, Pila, Laguna',
                'contact_number' => '0917-123-4567',
                'is_approved'    => 0,
                'created_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'user_id'        => 1,
                'pet_name'       => 'Buddy',
                'species'        => 'Dog',
                'breed'          => 'Golden Retriever',
                'status'         => 'for_adoption',
                'description'    => 'Gentle Golden Retriever looking for a loving home. Great with kids and families in Pila.',
                'image'          => 'https://i.pinimg.com/736x/1a/77/6d/1a776d85ae6701261a3f11bc24407abc.jpg', // Philippine adoption Golden
                'location'       => 'Labuin, Pila, Laguna',
                'contact_number' => '0918-987-6543',
                'is_approved'    => 1,
                'created_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'user_id'        => 1,
                'pet_name'       => 'Kiwi',
                'species'        => 'Bird',
                'breed'          => 'Lovebird',
                'status'         => 'registered',
                'description'    => 'Playful green lovebird. Talks a little and loves millet sprays.',
                'image'          => 'https://mir-s3-cdn-cf.behance.net/project_modules/fs/eff4b117594357.562bc1cd6bfa4.jpg', // Lovely Philippine lovebird
                'location'       => 'Aplaya, Pila, Laguna',
                'contact_number' => '0918-987-6543',
                'is_approved'    => 1,
                'created_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'user_id'        => 1,
                'pet_name'       => 'Milo',
                'species'        => 'Cat',
                'breed'          => 'Siamese',
                'status'         => 'lost',
                'description'    => 'Vocal Siamese cat with blue eyes. Missing near the market area.',
                'image'          => 'https://i.pinimg.com/736x/8d/e8/82/8de882662a98e858290ca274e2f91c97.jpg', // Lost Siamese in PH
                'location'       => 'Bagong Pook, Pila, Laguna',
                'contact_number' => '0920-555-1234',
                'is_approved'    => 0,
                'created_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'user_id'        => 1,
                'pet_name'       => 'Coco',
                'species'        => 'Dog',
                'breed'          => 'Shih Tzu',
                'status'         => 'registered',
                'description'    => 'Adorable small Shih Tzu, very affectionate and loves kids.',
                'image'          => 'https://i.pinimg.com/1200x/0a/36/8d/0a368d913e14f99daed3a1d31d5910dd.jpg', // Bonus cute dog (similar to local posts)
                'location'       => 'Bulilan Sur, Pila, Laguna',
                'contact_number' => '0939-888-9999',
                'is_approved'    => 1,
                'created_at'     => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('pets')->insertBatch($data);
    }
}