<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;

class CategoriesController extends BaseController
{
    public function index()
    {
        return view('Administration/categories');
    }
}