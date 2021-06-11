<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Busines;
use App\Repositories\CategoryRepository;

class DetailCategoryController extends Controller
{
    public function index($slug)
    {
        $category = CategoryRepository::getCategories(['slug' => $slug])->first();

        $business = Busines::where('category_id', '=', $category->id)->get();

        return view('frontend.detail-category', ['category' => $category, 'business' => $business]);
    }
}
