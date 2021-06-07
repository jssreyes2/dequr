<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Complaint extends Model
{
    use HasFactory;

    const COMPLAINT_ACTIVE= 'ACTIVO';
    const COMPLAINT_INACTIVE = 'INACTIVO';

    protected $table = 'complaints';

    protected $fillable = [];


    static public function saveComplaint($request)
    {
        $obj = new self();
        $slug = str_slug($request->title, '-');
        $obj->user_id = Auth::user()->id;
        $obj->busine_id = $request->busine_id;
        $obj->title =  ucwords(mb_strtolower($request->title));
        $obj->description = $request->description;
        $obj->country_id = $request->country_id;
        $obj->state = $request->state;
        $obj->company_site = $request->company_site;
        $obj->slug = $slug;
        $obj->status = Complaint::COMPLAINT_INACTIVE;
        $obj->save();

        #Guardamos en Activity Log
        ActivityLog::saveActivityLog($obj, 'saveCategory', [
            'categories' => $obj
        ]);
        return $obj;
    }
}
