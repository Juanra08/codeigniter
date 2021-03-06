<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;


class PruebaController extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Título de prueba",
            "numeros" => [1,2,3,4,5]
        ];
        
        return view("prueba",$data);

    }

    public function parametro($id)
    {
        //throw PageNotFoundException::forMethodNotFound();

        echo $id;
    }

    public function contacto(){

        $data = [
            "title" => "Título de contacto"
        ];

        return view("contacto",$data);
    }

    public function pruebaAjax(){
        
        $response = [
            "status" => "OK",
            "message" => "Ha ido bien",
            "data" => ""
        ];
        
        try{
            return json_encode($response);

        } catch(\Exception $e){
            $response["status"] = "KO";
            $response["message"] = "Ha ido mal";
            return json_encode($response);
        }
        
    }
}
