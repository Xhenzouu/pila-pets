<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table        = 'users';
    protected $primaryKey   = 'id';
    protected $useAutoIncrement = true;
    protected $returnType   = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'username',
        'email',
        'password',
        'role',
        'resident_id',
        'created_at'
    ];

    // Timestamps
    //protected $useTimestamps = true;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at'; // Optional: add updated_at column later if you want

    /**
     * Get full user data including resident details
     */
    public function getUserWithResident($userId)
    {
        return $this->select('users.*, residents.*')
                    ->join('residents', 'residents.id = users.resident_id', 'left')
                    ->where('users.id', $userId)
                    ->first();
    }

    /**
     * Optional: Find user by username or email (useful in login)
     */
    public function getByUsernameOrEmail($login)
    {
        return $this->where('username', $login)
                    ->orWhere('email', $login)
                    ->first();
    }
}