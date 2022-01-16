<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Models\RolesModel;

class RolesController extends BaseController
{
    public function index()
    {
        return view('Administration/roles');
    }
}