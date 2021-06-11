<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS_ACTIVE = 'ACTIVO';
    const STATUS_INACTIVE = 'INACTIVO';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];



    public function complaintComments()
    {
        return $this->belongsTo('App\Models\Complaint', 'complaint_id');
    }

    static public function saveComment($request)
    {
        $obj = new self();

        $userId=null;
        if (Auth::check()){
            $userId=Auth::user()->id;
        }

        $obj->complaint_id =$request->id;
        $obj->user_id =$userId;
        $obj->comment = $request->comment;
        $obj->status = Comment::STATUS_INACTIVE;
        $obj->save();
        return $obj;
    }
}
