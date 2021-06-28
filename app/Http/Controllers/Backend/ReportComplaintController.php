<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Busines;
use App\Models\Country;
use App\Repositories\BusinesRepository;
use App\Repositories\CommentRepository;
use App\Repositories\ComplaintRepository;
use App\Services\PhotoImportServices;
use Illuminate\Http\Request;
use File;

class ReportComplaintController extends Controller
{
    public function index(Request $request, $route = null)
    {
        $filter = [
            'search' => $request->get('search'),
            'status' => $request->get('status'),
            'busine_id' => $request->get('busine_id'),
            'country_id' => $request->get('country_id'),
        ];

        $complaints = ComplaintRepository::getComplaint($filter)->paginate(20);

        #Empresas
        $business = BusinesRepository::getBusiness(['status' => Busines::STATUS_ACTIVE])->get();

        #Paises
        $countries = Country::OrderBy('name', 'ASC')->get();

        return view('backend.reports.table_complaint', [
            'route' => $route,
            'complaints' => $complaints,
            'business' => $business,
            'countries' => $countries,
            'filter' => $filter
        ])->withErrors('Oops! no existe registro para mostrar');
    }


    public function viewModalComplaint(Request $request)
    {
        $filter = [
            'search' => $request->get('id'),
        ];

        $complaints = ComplaintRepository::getComplaint($filter)->first();

        $commentComplaints = CommentRepository::getComments(['complaint_id' => $request->get('id')])->get();

        return view('backend.reports.modal_description_complaint', [
            'complaints' => $complaints,
            'commentComplaints' => $commentComplaints,
        ]);
    }



    public function downloadFileComplaint($id)
    {
        $filter = [
            'id' => $id,
        ];

        $complaints = ComplaintRepository::getComplaint($filter)->first();

        $arrfiles = json_decode($complaints->file, true);

        if ($arrfiles) {
            $photoImportServices= new PhotoImportServices();
            return  $photoImportServices->downloadFileComplaint($complaints);
        }

        return redirect()->route('reports_complaint.index');
    }
}
