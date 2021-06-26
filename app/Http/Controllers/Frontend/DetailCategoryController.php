<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\ComplaintRepository;
use Illuminate\Http\Request;

class DetailCategoryController extends Controller
{
    public function index(Request $request, $slug)
    {

        $searchBusine = null;
        if ($request->search_busine) {
            $searchBusine = $request->search_busine;
        }

        $category = CategoryRepository::getCategories(['slug' => $slug])->first();

        $business = ComplaintRepository::getComplaintBusiness(['category_id' => $category->id, 'search_busine' => $searchBusine])->orderBy('id', 'DESC')->get();

        $recentBusiness = ComplaintRepository::getComplaintBusiness(['category_id' => $category->id])->orderBy('id', 'DESC')->limit(4)->get();

        return view('frontend.detail-category', ['category' => $category, 'business' => $business, 'recentBusiness' => $recentBusiness, 'searchBusine' => $searchBusine]);
    }
}
