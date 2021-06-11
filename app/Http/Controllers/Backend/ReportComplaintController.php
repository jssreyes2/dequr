<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Busines;
use App\Models\Country;
use App\Repositories\BusinesRepository;
use App\Repositories\ComplaintRepository;
use Illuminate\Http\Request;
use File;
use ZipArchive;

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

        return view('backend.reports.modal_description_complaint', [
            'complaints' => $complaints,
        ]);
    }



    public function downloadFileComplaint(Request $request)
    {
        $filter = [
            'id' => $request->get('id'),
        ];

        $complaints = ComplaintRepository::getComplaint($filter)->first();

        $arrfiles = json_decode($complaints->file, true);

        if ($arrfiles) {

            $zip = new \ZipArchive();
            $fileName = $complaints->slug . '.zip';

            if ($zip->open(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'complaint_files' . DIRECTORY_SEPARATOR . $complaints->id . DIRECTORY_SEPARATOR . $fileName), ZipArchive::CREATE) === TRUE) {
                $files = File::files(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'complaint_files' . DIRECTORY_SEPARATOR . $complaints->id));
                foreach ($files as $key => $value) {
                    $relativeNameInZipFile = basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }

                $zip->close();
            }

            return response()->download(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'complaint_files' . DIRECTORY_SEPARATOR . $complaints->id . DIRECTORY_SEPARATOR . $fileName));
        }

        return redirect()->route('reports_complaint.index');
    }
}
