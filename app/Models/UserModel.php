<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = '"user"'; // Enclose the table name in double quotes
    protected $primaryKey = 'username'; // Primary key
    protected $allowedFields = ['username', 'password', 'name']; // Allowed fields

    public function validateUser($username, $password)
    {
        $hashedPassword = md5($password); // Hash password for validation
        return $this->where('username', $username)
                    ->where('password', $hashedPassword)
                    ->first();
    }
}
