<?php

namespace App\Models;

use CodeIgniter\Model;

class PetModel extends Model
{
    protected $table = 'pets';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'pet_name',
        'species',
        'breed',
        'status',
        'description',
        'image',
        'location',
        'contact_number',
        'is_approved',
        'created_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';

    // Join with users table for owner info
    public function getPetsWithOwner()
    {
        return $this->select('pets.*, users.username as owner_name, users.email as owner_email')
                    ->join('users', 'users.id = pets.user_id')
                    ->findAll();
    }
}