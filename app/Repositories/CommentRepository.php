<?php

namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentRepository extends Comment
{

    public static function getComments($filter = [])
    {
        $query = Comment::leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->join('complaints', 'comments.complaint_id', '=', 'complaints.id');

        $query->select('comments.*', 'users.firstname', 'users.lastname', 'users.avatar');

        if (isset($filter) and !empty($filter['complaint_id'])) {
            $query->where('comments.complaint_id', '=', $filter['complaint_id']);
        }

        if (isset($filter) and !empty($filter['status'])) {
            $query->where('comments.status', '=', $filter['status']);
        }

        $query->orderBy('complaints.created_at', 'DESC');

        return $query;
    }


    public static function getNotifications()
    {
        $query = Comment::Join('complaints', 'comments.complaint_id', '=', 'complaints.id');

        $query->select('complaints.user_id', 'complaints.slug', 'comments.complaint_id', 'complaints.title', 'comments.created_at')
            ->where('complaints.user_id', '=', Auth::user()->id);

        $query->groupBy('comments.complaint_id');

        $query->orderBy('comments.created_at', 'DESC');

        return $query;

    }

}
