<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Users;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Users::class;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['username','email','password','name','rol_id'];

    // Dates
    protected $useTimestamps = false;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function checkUser($user) {
        $result = $this->where(['username' => $user])
                        ->orWhere(['email' => $user])
                        ->first();
        
        return $result;
    }

    public function usersDatatable($limitStart, $limitLenght) {
        return $this->limit($limitLenght, $limitStart)
                    ->find();
    }
}
