<?php

namespace App\Repositories;

use App\Models\Complaint;
use Illuminate\Support\Facades\DB;

class ComplaintRepository extends Complaint
{

    public static function getComplaint($filter = [])
    {
        $query = Complaint::join('users', 'complaints.user_id', '=', 'users.id')
            ->join('business', 'complaints.busine_id', '=', 'business.id')
            ->join('countries', 'complaints.country_id', '=', 'countries.id');

        $query->select('complaints.*', 'users.firstname', 'users.lastname', 'users.email', 'business.name As busine_name', 'countries.name AS country_name');


        if (isset($filter) and !empty($filter['search'])) {
            $query->where(DB::raw("CONCAT_WS(' ', complaints.title, users.firstname, users.lastname, business.name, countries.name) "), 'LIKE', "%" . $filter['search'] . "%");
        }

        if (isset($filter) and !empty($filter['status'])) {
            $query->where('complaints.status', '=', $filter['status']);
        }

        if (isset($filter) and !empty($filter['slug'])) {
            $query->where('business.slug', '=', $filter['slug']);
        }

        if (isset($filter) and !empty($filter['busine_id'])) {
            $query->where('complaints.busine_id', '=', $filter['busine_id']);
        }

        if (isset($filter) and !empty($filter['country_id'])) {
            $query->where('complaints.country_id', '=', $filter['country_id']);
        }

        if (isset($filter) and !empty($filter['id'])) {
            $query->where('complaints.id', '=', $filter['id']);
        }

        $query->orderBy('complaints.created_at', 'DESC');

        return $query;
    }
}
