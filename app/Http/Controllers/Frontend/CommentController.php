<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Repositories\ComplaintRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $complaints = ComplaintRepository::getComplaint(['status' => Complaint::COMPLAINT_ACTIVE, 'user_id' => Auth::user()->id])->paginate(4);

        return view('frontend.comments', ['complaints' => $complaints]);
    }
}
