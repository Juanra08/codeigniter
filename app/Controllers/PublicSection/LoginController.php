<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Libraries\UtilLibrary;

class LoginController extends BaseController
{
    public function index()
    {
        return view("PublicSection/login");
    }

    public function login() {

        $request = $this->request;

        $username = $request->getVar("username");
        $password = $request->getVar("password");

        $users = new UsersModel();
        $util = new UtilLibrary();
        
        $userExist = $users->checkUser($username);

        if ($userExist != null) {
            return $util->getResponse('OK', 'Login correcto');;
        } else {
            return $util->getResponse('KO', 'Login incorrecto');;
        }
    }
}
