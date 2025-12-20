<?php

namespace App\Models;

use CodeIgniter\Model;

class ResidentModel extends Model
{
    protected $table            = 'residents';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'first_name',
        'middle_name',
        'last_name',
        'barangay',
        'contact_number',
        'email',        // ← Add this line
        'created_at'
    ];

    protected $useTimestamps = false;

    // Optional: Helpful method to get full resident data
    public function getResidentById($id)
    {
        return $this->find($id);
    }
}