<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Busines extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS_ACTIVE = 'ACTIVO';
    const STATUS_INACTIVE = 'INACTIVO';

    protected $table = 'business';

    protected $fillable = [];



    static public function saveBusines($request)
    {
        $obj = new self();
        $slug = str_slug($request->name, '-');
        $obj->name = mb_strtoupper($request->name);
        $obj->description = ucfirst(mb_strtolower($request->description));
        $obj->status = $request->status;
        $obj->slug = $slug;
        $obj->save();

        #Guardamos en Activity Log
        ActivityLog::saveActivityLog($obj, 'saveBusines', [
            'business' => $obj
        ]);

        return $obj;
    }

    static public function saveBusineComplaint($request)
    {
        $obj = new self();
        $slug = str_slug($request->busine, '-');
        $obj->name = mb_strtoupper($request->busine);
        $obj->status = Busines::STATUS_ACTIVE;
        $obj->slug = $slug;
        $obj->save();

        return $obj;
    }



    static public function updateBusines($request)
    {
        $obj = new self();
        $obj = $obj->find($request->id);

        $slug = str_slug($request->name, '-');
        $obj->name = mb_strtoupper($request->name);
        $obj->description = ucfirst(mb_strtolower($request->description));
        $obj->status = $request->status;
        $obj->slug = $slug;
        $obj->save();

        #Guardamos en Activity Log
        ActivityLog::saveActivityLog($obj, 'updateBusines', [
            'business' => $obj
        ]);

        return $obj;
    }



    static public function deleteBusines($id)
    {
        $obj = new self();

        $busines=$obj->find($id);
        $obj->find($id)->delete();

        #Guardamos en Activity Log
        ActivityLog::saveActivityLog($busines, 'deleteBusines', [
            'business' => $busines
        ]);

        return $busines;
    }

}
