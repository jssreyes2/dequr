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

    const TYPE_FOR_DESTACAR = 'POR DESTACAR';
    const TYPE_PROMINENT = 'DESTACADO';

    protected $table = 'complaints';

    protected $fillable = [];


    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    static public function saveComplaint($request)
    {
        $obj = new self();
        $slug = str_slug($request->title, '-');
        $obj->user_id = Auth::user()->id;
        $obj->busine_id = $request->busine_id;
        $obj->category_id = $request->category_id;
        $obj->title =  ucwords(mb_strtolower($request->title));
        $obj->description = $request->description;
        $obj->country_id = $request->country_id;
        $obj->state = $request->state;
        $obj->company_site = $request->company_site;
        $obj->slug = $slug;
        $obj->status = Complaint::COMPLAINT_INACTIVE;
        $obj->type = Complaint::TYPE_FOR_DESTACAR;
        $obj->save();

        #Guardamos en Activity Log
        ActivityLog::saveActivityLog($obj, 'saveCategory', [
            'categories' => $obj
        ]);
        return $obj;
    }


    static public function updateComplaint($request)
    {
        $obj = new self();
        $obj = $obj->find($request->id);

        $slug = str_slug($request->title, '-');
        $obj->busine_id = $request->busine_id;
        $obj->title =  ucwords(mb_strtolower($request->title));
        $obj->description = $request->description;
        $obj->country_id = $request->country_id;
        $obj->state = $request->state;
        $obj->company_site = $request->company_site;
        $obj->slug = $slug;
        $obj->status = $request->status;
        $obj->type = $request->type;

        $obj->save();

        #Guardamos en Activity Log
        ActivityLog::saveActivityLog($obj, 'updateComplaint', [
            'complaint' => $obj
        ]);

        return $obj;
    }

}
