<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';        // Table name
    protected $primaryKey = 'id';      // Primary key field
    protected $returnType = 'object';  // Return as an object instead of array (optional)
    protected $allowedFields = ['id', 'first_name', 'last_name', 'username', 'email']; // Define fields that can be inserted/updated

    // Method to get a user by their publisher ID
    public function getUser($publisher_id) {
        return $this->where('id', $publisher_id)->first(); // Using 'first()' instead of 'row()' in CI4
    }
}
