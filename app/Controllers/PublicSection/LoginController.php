<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Libraries\UtilLibrary;
use App\Models\RolesModel;
use Config\UserProfiles;
use CodeIgniter\I18n\Time;

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
        $roles = new RolesModel();
        $util = new UtilLibrary();
        
        $userExist = $users->checkUser($username);

        if ($userExist != null) {
            if (password_verify($password, $userExist->password)) {

                $isAdmin = $roles->isAdmin($userExist);
                
                //Create the session
                $session = session();

                $data = [
                    'username' => $userExist->username,
                    'email'    => $userExist->email,
                    'role'     => $isAdmin ? UserProfiles::ADMIN_ROLE : UserProfiles::APP_CLIENT_ROLE,
                    'date'     => new Time()
                ];
                
                //Set the data to the session
                $session->set($data);

                return $util->getResponse('OK', 'Login correcto', $data);
            } else {
                return $util->getResponse('KO', 'Login incorrecto');
            }

        } else {
            return $util->getResponse('KO', 'Login incorrecto');
        }
    }
}
