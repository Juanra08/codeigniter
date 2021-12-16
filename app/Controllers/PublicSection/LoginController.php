<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;

use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view("PublicSection/login");
    }

    public function showFormLogin(){

    }

    public function login() {

        $request = $this->request;

        $username = $request->getVar("username");
        $password = $request->getVar("password");

        $users = new UsersModel();

        $allUsers = $users->findAll();

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
