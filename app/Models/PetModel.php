<?php

namespace App\Models;

use CodeIgniter\Model;

class PetModel extends Model
{
    protected $table            = 'pets';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'user_id', 'pet_name', 'species', 'breed', 'status',
        'description', 'image', 'location', 'contact_number', 'created_at'
    ];

    // Fetch pets with owner name (concatenated from residents table)
    public function getPetsWithOwner()
    {
        return $this->select('pets.*, 
                COALESCE(
                    CONCAT(
                        residents.first_name, 
                        " ", 
                        IFNULL(CONCAT(residents.middle_name, " "), ""), 
                        residents.last_name
                    ), 
                    users.username
                ) as owner_name')
                    ->join('users', 'users.id = pets.user_id', 'left')
                    ->join('residents', 'residents.id = users.resident_id', 'left')
                    ->findAll();
    }
}