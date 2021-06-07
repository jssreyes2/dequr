<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class DetailCategoryController extends Controller
{
    public function index($slug)
    {
        $filter = [
            'slug' => $slug,
        ];

        $category = CategoryRepository::getCategories($filter)->first();

        return view('frontend.detail-category', ['category' => $category]);
    }
}
