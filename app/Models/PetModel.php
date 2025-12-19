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
        'created_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';

    // Fetch pets with owner name sourced from residents (fallback to username)
    public function getPetsWithOwner()
    {
        return $this->select('pets.*, COALESCE(residents.full_name, users.username) as owner_name')
                    ->join('users', 'users.id = pets.user_id', 'left')
                    ->join('residents', 'residents.id = users.resident_id', 'left')
                    ->findAll();
    }
}