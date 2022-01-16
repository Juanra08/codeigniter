<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function index()
    {
        return view('Administration/users');
    }
}