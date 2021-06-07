<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Busines;
use App\Models\Complaint;
use App\Models\Country;
use App\Services\PhotoImportServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostComplaintController extends Controller
{
    public function index()
    {
        $countries = Country::OrderBy('name', 'ASC')->get();

        $busines = Busines::OrderBy('name', 'ASC')->get();

        return view('frontend.post_complaint', ['countries' => $countries, 'busines' => $busines]);
    }


    public function store(Request $request)
    {

        if (!Auth::check()){
            return response()->json(['status' => 'fail', 'session' => true]);
        }

        $busine = $request->busine_id;
        if (!is_numeric($request->busine_id)) {
            $dataBusine = Busines::saveBusineComplaint($request);
            $busine = $dataBusine->id;
        }
        $request->merge(['busine_id' => $busine]);

        $complaint=Complaint::saveComplaint($request);

        if ($request->hasfile('file')) {
            $PhotoImportServices = new PhotoImportServices();
            $PhotoImportServices->importFileComplaint($complaint, $request);
        }

        return response()->json(['status' => 'success', 'alert' => config('app.alert_success')]);
    }
}
