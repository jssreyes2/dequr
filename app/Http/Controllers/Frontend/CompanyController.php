<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\ComplaintRepository;
use App\Services\PhotoImportServices;
use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Busines;

class CompanyController extends Controller
{
    public function index()
    {
        $business = ComplaintRepository::getComplaintBusiness()->get();

        return view('frontend.companies', ['business' => $business]);
    }

    public function show($slug)
    {
        $complaints = ComplaintRepository::getComplaint(['slug' => $slug])->get();

        $complaintstotal = 0;
        if (isset($complaints[0]['busine_id'])) {
            $complaintstotal = ComplaintRepository::totalComment($complaints[0]['busine_id']);
            Busines::numberOfVisits($complaints[0]['busine_id']);
        }


        return view('frontend.company', ['complaints' => $complaints, 'complaintstotal' => $complaintstotal]);
    }


    public function downloadFileComplaint($id)
    {
        $filter = [
            'id' => $id,
        ];

        $complaints = ComplaintRepository::getComplaint($filter)->first();

        $arrfiles = json_decode($complaints->file, true);

        if ($arrfiles) {

            $photoImportServices = new PhotoImportServices();
            return $photoImportServices->downloadFileComplaint($complaints);
        }

        return redirect()->to('company/' . $complaints->busine_slug);
    }
}
