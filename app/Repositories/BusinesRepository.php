<?php

namespace App\Repositories;

use App\Models\Busines;
use Illuminate\Support\Facades\DB;

class BusinesRepository extends Busines
{

    public static function getBusiness($filter = [])
    {

        $query = Busines::join('categories', 'business.category_id', '=', 'categories.id');

        $query->select('business.*', 'categories.name As category_name');

        if (isset($filter) and !empty($filter['search'])) {

            $query->where(DB::raw("CONCAT_WS(' ', name) "), 'LIKE', "%" . $filter['search'] . "%");
        }

        if (isset($filter) and !empty($filter['status'])) {

            $query->where('business.status', '=',  $filter['status']);
        }

        if (isset($filter) and !empty($filter['slug'])) {

            $query->where('slug', '=', $filter['slug']);
        }

        $query->orderBy('name');

        return $query;
    }
}
