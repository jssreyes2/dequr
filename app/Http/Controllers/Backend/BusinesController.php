<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Busines;
use App\Repositories\BusinesRepository;
use App\Services\PhotoImportServices;
use Illuminate\Http\Request;

class BusinesController extends Controller
{
    public function index(Request $request, $route = null)
    {
        $filter = [
            'search' => $request->get('search'),
            'status' => $request->get('status'),
        ];

        $business = BusinesRepository::getBusiness($filter)->paginate(20);

        return view('backend.records.table_business', [
            'route' => $route,
            'business' => $business
        ])->withErrors('Oops! no existe registro para mostrar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($route = null)
    {
        return view('backend.forms.forms_busines', [
            'route' => $route
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $busines = Busines::where('name', '=', mb_strtoupper($request->name))->first();

        if ($busines instanceof Busines) {
            return response()->json(['status' => 'fail', 'alert' => 'La empresa ya se encuentra registrada']);
        }


        if (!$request->hasfile('photo')) {
            return response()->json(['status' => 'fail', 'alert' => 'Seleccione una foto valida']);
        }

        $busines=Busines::saveBusines($request);

        $PhotoImportServices = new PhotoImportServices();

        $PhotoImportServices->importPhotoBusines($busines, $request);

        return response()->json(['status' => 'success', 'alert' => config('app.alert_success'), 'create' => true, 'update' => false]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $route = null)
    {
        $busines = Busines::where('id', '=', $id)->first();

        return view('backend.forms.forms_busines', [
            'route' => $route,
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

        $busines = Busines::updateBusines($request);

        if ($busines) {

            if ($request->hasfile('photo')) {
                $PhotoImportServices = new PhotoImportServices();
                $PhotoImportServices->importPhotoBusines($busines, $request);
            }

            return response()->json(['status' => 'success', 'alert' => config('app.alert_success')]);
        }

        return response()->json(['status' => 'fail', 'alert' => config('app.alert_fail')]);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $PhotoImportServices = new PhotoImportServices();

        $busines=Busines::where('id', '=', $request->id)->first();

        $PhotoImportServices->deletePhotoBusines($busines);

        $busines = Busines::deleteBusines($request->id);

        if ($busines) {
            return response()->json(['status' => 'success', 'alert' => config('app.alert_success_delete')]);
        }

        return response()->json(['status' => 'success', 'alert' => config('app.alert_fail_delete')]);

    }
}
