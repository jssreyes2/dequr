<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Busines;
use App\Models\Category;
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

        $busines = Busines::where('status', '=', Busines::STATUS_ACTIVE)->OrderBy('name', 'ASC')->get();

        $categories = Category::where('status', '=', Category::STATUS_ACTIVE)->OrderBy('name', 'ASC')->get();

        return view('frontend.post_complaint', ['countries' => $countries, 'busines' => $busines, 'categories' => $categories]);
    }


    public function store(Request $request)
    {

        if (!Auth::check()){
            return response()->json(['status' => 'fail', 'session' => true]);
        }

        $busine=null;
        if($request->busine){
            $busine = $request->busine;
        }else{
            $busine = $request->busine_id;
        }

        if(empty($busine)){
            return response()->json(['status' => 'fail', 'message' => 'Seleccione o introduzca la empresas']);
        }


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

        return response()->json(['status' => 'success', 'message' => config('app.alert_success')]);
    }
}
