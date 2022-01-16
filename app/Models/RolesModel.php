<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Roles;
use Config\UserProfiles;

class RolesModel extends Model
{
    protected $table            = 'roles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Roles::class;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['name'];

    // Dates
    protected $useTimestamps = false;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function isAdmin($user) {
        $result = $this->where(['id' => $user->rol_id])
                    ->first();
        
        if ($result->name == UserProfiles::ADMIN_ROLE) {
            return true;
        }

        return false;
    }

    public function rolesDatatable($limitStart, $limitLenght) {
        return $this->limit($limitLenght, $limitStart)
                    ->find();
    }
}
