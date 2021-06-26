<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Complaint;
use App\Repositories\ComplaintRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $searchComplaint=null;
        if($request->search){
            $searchComplaint = strtolower($request->search);
        }

        $complaints = ComplaintRepository::getComplaint([
            'status' => Complaint::COMPLAINT_ACTIVE,
            'type' => Complaint::TYPE_FOR_DESTACAR,
            'search_complaint' => $searchComplaint
        ])->paginate(10);

        $complaintsPromient = ComplaintRepository::getComplaint(['status' => Complaint::COMPLAINT_ACTIVE, 'type' => Complaint::TYPE_PROMINENT])->paginate(10);

        $recentComplaints = ComplaintRepository::getComplaint(['status' => Complaint::COMPLAINT_ACTIVE])->paginate(5);

        $categories = Category::where('status', '=', Category::STATUS_ACTIVE)->OrderBy('name', 'ASC')->get();

        return view('frontend.index', [
            'user' => Auth::user(),
            'complaints' => $complaints,
            'complaintsPromient' => $complaintsPromient,
            'recentComplaints' => $recentComplaints,
            'categories' => $categories
        ]);
    }
}
