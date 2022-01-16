<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
use App\Models\FestivalsModel;
use App\Entities\Festivals;
use App\Models\CategoriesModel;
use Exception;

class FestivalsController extends BaseController
{
    public function index()
    {    
        return view('Administration/festivals');
    }

    public function getFestivalsData() {
        
        $request = $this->request;

        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");

        $draw = $request->getVar("draw");

        $festM = new FestivalsModel();

        $festivals = $festM->findFestivalsDatatable($limitStart, $limitLenght);

        $totalRecords = $festM->countAllResults();

        //$totalRecords = 2;

        $json_data = array(
            "draw" => $draw, 
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $festivals,
        );

        return json_encode($json_data);
    }

    public function deleteFestival() {
        try {
            $request = $this->request;
            $data = $request->getJSON();
    
            $util = new UtilLibrary();
            
            $festM = new FestivalsModel();
    
            $delete = $festM->deleteFestival($data->id);
    
            if($delete) {
                return $util->getResponse('OK', 'Festival eliminado', $request);
            } else {
                return $util->getResponse('KO', 'Error al eliminar el festival', '');
            }
        } catch (Exception $e) {
            $util = new UtilLibrary();
            return $util->getResponse('KO', 'Error del servidor', '');
        }
    }

    public function viewEditFestival($id="") {
    
        $data = array (
            'title' => '',
            'festival' => "",
            'categories' => ""
        );

        $cM = new CategoriesModel();

        $categories = $cM->findCategories();

        if(strcmp($id,"")===0) {
    
            $data["title"] = "Nuevo festival";
            $data["festival"] = new Festivals();
            $data['categories'] = $categories;
    
        } else {
    
            $fM = new FestivalsModel();
    
            $festival = $fM->find($id);

            if(is_null($festival))
                throw PageNotFoundException::forPageNotFound();
    
            $data["title"] = "Editar festival";
            $data["festival"] = $festival;
            $data['categories'] = $categories;
    
        }
    
        return view('Administration/festivals_edit', $data);

    }

    public function saveFestival() {
        $util = new UtilLibrary();

        try {
            $request = $this->request;

            $festM = new FestivalsModel();

            $data = [
                'id' => $request->getVar("id"),
                'name' => $request->getVar("name"),
                'email' => $request->getVar("email"),
                'date' => $request->getVar("date"),
                'price' => $request->getVar("price"),
                'address' => $request->getVar("address"),
                'image_url' => $request->getVar("image_url"),
                'category_id' => $request->getVar("category_id"),
            ];

            if(strcmp($data["id"],"")!==0) {
                $festival=$festM->findFestivals($data["id"]);
                if(is_null($festival))
                    return $util->getResponse("KO_NOT_FOUND","El festival que intentas editar no existe");                    
            } else {
                $festival = new Festivals();
            }

            $festival->fill($data);
            $festM->save($festival);

            return $util->getResponse("OK", "Festival guardado correctamente");

        } catch(\Exception $e) {
            return $util->getResponse("KO", "Se ha producido un error",$data);
        }
    }

}

