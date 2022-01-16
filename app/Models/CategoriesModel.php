<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;
use App\Entities\Categories;

class CategoriesModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Categories::class;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['title'];

    // Dates
    protected $useTimestamps = false;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function findCategories() {
        return $this->findAll();
    }

    public function findCategoriesById($id) {
        return $this->where(['id' => $id])
                    ->first();
    }

    public function deleteCategory($id) {
        try {
            $this->where('id', $id)
                ->delete();
            return true;
        } catch (Exception $e) {
            return false;
        }        
    }
}
