<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Busines;
use App\Models\Comment;
use App\Models\Complaint;
use App\Models\Country;
use App\Repositories\CommentRepository;
use App\Repositories\ComplaintRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index(request $request, $slug=null)
    {
        $searchComplaint=null;
        if(!$slug){
            $searchComplaint = str_slug($request->search, '-');
        }

        $complaint = ComplaintRepository::getComplaint(['slug_complaint' => $slug, 'search_complaint' => $searchComplaint])->first();

        if(empty($complaint)){
            return redirect()->route('principal');
        }

        $date = Carbon::parse($complaint->created_at);

        $comments=CommentRepository::getComments(['complaint_id' => $complaint->id, 'status' => Comment::STATUS_ACTIVE])->get();

        $recentComplaints = ComplaintRepository::getComplaint(['status' => Complaint::COMPLAINT_ACTIVE])->paginate(5);

        $arrfiles = json_decode($complaint->file_img, true);

        return view('frontend.complaints', [
            'complaint' =>$complaint,
            'date' => $date->toFormattedDateString(),
            'comments' => $comments,
            'search' => mb_strtolower($searchComplaint),
            'recentComplaints' => $recentComplaints,
            'arrfiles' => $arrfiles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $route = null)
    {
        $complaint = Complaint::where('id', '=', $id)->first();

        $countries = Country::OrderBy('name', 'ASC')->get();

        $busines = Busines::OrderBy('name', 'ASC')->get();

        return view('backend.forms.forms_complaint', [
            'route' => $route,
            'complaint' => $complaint,
            'countries' => $countries,
            'busines' => $busines
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $complaint = Complaint::updateComplaint($request);

        if ($complaint) {
            return response()->json(['status' => 'success', 'alert' => env('MSJ_SUCCESS'), 'update' => true]);
        }

        return response()->json(['status' => 'success', 'alert' => env('MSJ_FAIL')]);
    }


}
