<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\ComplaintRepository;

class DetailCategoryController extends Controller
{
    public function index($slug)
    {
        $category = CategoryRepository::getCategories(['slug' => $slug])->first();

        $business = ComplaintRepository::getComplaintBusiness(['category_id' => $category->id])->get();

        return view('frontend.detail-category', ['category' => $category, 'business' => $business]);
    }
}
