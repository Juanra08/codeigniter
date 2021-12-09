<?php

namespace App\Models;

use App\Database\Migrations\Festivals;
use CodeIgniter\Model;

class FestivalsModel extends Model
{
    protected $table            = 'festivals';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Festivals::class;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['name'];

    // Dates
    protected $useTimestamps = false;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
