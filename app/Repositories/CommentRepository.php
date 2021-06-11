<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository extends Comment
{

    public static function getComments($filter = [])
    {
        $query = Comment::leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->join('complaints', 'comments.complaint_id', '=', 'complaints.id');

        $query->select('comments.*', 'users.firstname', 'users.lastname');


        if (isset($filter) and !empty($filter['complaints_id'])) {
            $query->where('complaints.id', '=', $filter['complaints_id']);
        }

        if (isset($filter) and !empty($filter['status'])) {
            $query->where('comments.status', '=', $filter['status']);
        }

        $query->orderBy('complaints.created_at', 'DESC');

        return $query;
    }
}
