<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function index()
    {
        $filter = [
            'status' => Category::STATUS_ACTIVE,
        ];

        $categories = CategoryRepository::getCategories($filter)->get();

        return view('frontend.category', ['categories' => $categories]);
    }
}
