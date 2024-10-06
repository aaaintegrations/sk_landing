<?php

namespace App\Models;

use CodeIgniter\Model;

class LandingModel extends Model
{
    protected $table = 'landings';        // Table name
    protected $primaryKey = 'id';         // Primary key field
    protected $returnType = 'object';     // Return as an object instead of array (optional)
    protected $allowedFields = ['id', 'id_user', 'id_file', 'landing_url', '', 'landing_type', 'landing_status', 'created_at', 'updated_at']; // Define fields that can be inserted/updated

    /**
     * Get landing by file ID and type
     */
    public function getLandingByFileId($file_id, $type) {
        return $this->where('id', $file_id)
                    ->where('landing_type', $type)
                    ->where('landing_status', 'ACTV')
                    ->first(); // Using `first()` to get a single row
    }

    /**
     * Get a random active landing
     */
    public function getActiveRandomLanding($type) {
        return $this->where('landing_type', $type)
                    ->where('landing_status', 'ACTV')
                    ->orderBy('RAND()')
                    ->first(); // Using `first()` to get a single random row
    }
}
