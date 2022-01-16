<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;
use App\Entities\Festivals;

class FestivalsModel extends Model
{
    protected $table            = 'festivals';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Festivals::class;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['name','email','date','price','address','image_url','category_id'];
    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function findFestivalsDatatable($limitStart, $limitLenght) {
        return $this->limit($limitLenght, $limitStart)
                    ->find();
    }

    public function deleteFestival($id) {
        try {
            $this->where('id', $id)
                ->delete();
            return true;
        } catch (Exception $e) {
            return false;
        }        
    }

    public function findFestivals($id) {
        return $this->where(['id' => $id])
                    ->first();
    }
}
