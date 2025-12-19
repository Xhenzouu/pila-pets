<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'email', 'role', 'resident_id']; // added resident_id

    // Optional: Join with residents table
    public function getUserWithResident($userId)
    {
        return $this->select('users.*, residents.*')
                    ->join('residents', 'residents.id = users.resident_id', 'left')
                    ->where('users.id', $userId)
                    ->first();
    }
}