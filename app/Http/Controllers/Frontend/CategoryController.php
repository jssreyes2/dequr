<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Complaint;
use App\Repositories\CategoryRepository;
use App\Repositories\ComplaintRepository;
use function Faker\Provider\kk_KZ\Company;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryRepository::getCategories(['status' => Category::STATUS_ACTIVE])->get();

        $complaints = ComplaintRepository::getComplaint(['status' => Complaint::COMPLAINT_ACTIVE])->paginate(10);

        #Quejas de empresas con categoria de animales
        $complaintsPromient = ComplaintRepository::getComplaint(['status' => Complaint::COMPLAINT_ACTIVE, 'category_slug' => 'animales'])->paginate(10);

        $recentComplaints = ComplaintRepository::getComplaint(['status' => Complaint::COMPLAINT_ACTIVE])->paginate(5);

        return view('frontend.category', [
            'categories' => $categories,
            'complaintsPromient' => $complaintsPromient,
            'complaints' => $complaints,
            'recentComplaints' => $recentComplaints
        ]);
    }
}
