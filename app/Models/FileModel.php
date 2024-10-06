<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table = 'files';        // Table name
    protected $primaryKey = 'id';      // Primary key field
    protected $returnType = 'object';  // Return as an object instead of array (optional)
    protected $allowedFields = ['id', 'id_user', 'id_file', 'file_name', 'file_password', 'windows_url', 'mac_url', 'file_type', 'file_status', 'created_at', 'updated_at']; // Define fields that can be inserted/updated

    /**
     * Get files for a user
     */
    public function getFileForUser() {
        return $this->select('files.*, landings.id_file, landings.landing_status')
                    ->join('landings', 'files.id = landings.id_file', 'inner')
                    ->where('files.file_type', 'USER')
                    ->where('files.file_status', 'ACTV')
                    ->where('landings.landing_status', 'ACTV')
                    ->get()
                    ->getResult(); // Using `getResult()` instead of `result()`
    }

    /**
     * Get general files
     */
    public function getFileForGeneral() {
        return $this->where('file_type', 'GNRL')
                    ->where('file_status', 'ACTV')
                    ->first(); // Using `first()` instead of `row()`
    }
}
