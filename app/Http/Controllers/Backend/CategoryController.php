<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($route = null)
    {
        return view('backend.records.table_categories', [
            'route' => $route
        ])->withErrors('Oops! no existe registro para mostrar');

    }
}
