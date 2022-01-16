<?php

namespace App\Controllers\Rest;

use App\Entities\Categories;
use App\Models\CategoriesModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class CategoriesController extends ResourceController
{

    protected $modelName = 'App\Models\CategoriesModel';
    protected $format = 'json';

    public function index()
    {
        //
    }

    public function getCategories($id="") {

        try {

            if(strcmp($id,"")===0) {

                $categories = $this->model->findCategories();

                if ($categories) {
                    return $this->respond($categories, 200, 'Categoria encontrada');
                } else {
                    return $this->respond('', 404, 'Categoria no encontrada');
                }
                
            }else {

                $categories = $this->model->findCategoriesById($id);

                if ($categories) {
                    return $this->respond($categories, 200, 'Categoria encontrada');
                } else {
                    return $this->respond('', 404, 'Categoria no encontrada');
                }

            }

        } catch (Exception $e){
            return $this->respond('', 500, 'Error del servidor');
        }

    }

    public function deleteCategories(){

        try {

            $request = $this->request;
            $data = $request->getJSON();
            $id = $data->id;

            $delete = $this->model->deleteCategory($id);

            if ($delete) {
                return $this->respond("", 200, 'Categoria eliminada');
            }else {
                return $this->respond('', 404, 'Categoria no encontrada');
            }

        }catch (Exception $e){
            return $this->respond('', 500, 'Error del servidor');
        }

    }

    public function saveCategories(){

        try {

            $request = $this->request;
            $data = $request->getJSON();
            $id = $data->id;

            $delete = $this->model->deleteCategory($id);

            if ($delete) {
                return $this->respond("", 200, 'Categoria eliminada');
            }else {
                return $this->respond('', 404, 'Categoria no encontrada');
            }

        }catch (Exception $e){
            return $this->respond('', 500, 'Error del servidor');
        }

    }
}
