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
            ->join('countries', 'complaints.country_id', '=', 'countries.id')
            ->join('categories', 'business.category_id', '=', 'categories.id');
        $query->select('complaints.*', 'users.firstname', 'users.lastname', 'users.email', 'users.avatar', 'business.name AS busine_name', 'business.logo AS logo', 'business.slug AS busine_slug', 'countries.name AS country_name');


        if (isset($filter) and !empty($filter['search'])) {
            $query->where(DB::raw("CONCAT_WS(' ', complaints.title, users.firstname, users.lastname, business.name, countries.name) "), 'LIKE', "%" . $filter['search'] . "%");
        }

        if (isset($filter) and !empty($filter['search_complaint'])) {
            $query->where(DB::raw("CONCAT_WS(' ', complaints.title) "), 'LIKE', "%" . $filter['search_complaint'] . "%");
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

        if (isset($filter) and !empty($filter['slug_complaint'])) {
            $query->where('complaints.slug', '=', $filter['slug_complaint']);
        }

        if (isset($filter) and !empty($filter['type'])) {
            $query->where('complaints.type', '=', $filter['type']);
        }

        if (isset($filter) and !empty($filter['category_slug'])) {
            $query->where('categories.slug', '=', $filter['category_slug']);
        }

        if (isset($filter) and !empty($filter['user_id'])) {
            $query->where('complaints.user_id', '=', $filter['user_id']);
        }

        $query->orderBy('complaints.created_at', 'DESC');

        return $query;
    }


    public static function getComplaintBusiness($filter = null)
    {
        $query = Complaint::join('business', 'complaints.busine_id', '=', 'business.id')
            ->select(DB::raw('COUNT(complaints.busine_id) as total_business'), 'business.*');

        if (isset($filter['category_id'])) {
            $query->where('business.category_id', '=', $filter['category_id']);
        }

        $query->groupBy('business.id');

        return $query;
    }

}
