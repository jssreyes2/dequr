<?php

namespace App\Repositories;

use App\Models\Busines;
use Illuminate\Support\Facades\DB;

class BusinesRepository extends Busines
{

    public static function getBusiness($filter = [])
    {
        $query = Busines::query();

        if (isset($filter) and !empty($filter['search'])) {

            $query->where(DB::raw("CONCAT_WS(' ', name) "), 'LIKE', "%" . $filter['search'] . "%");
        }

        if (isset($filter) and !empty($filter['status'])) {

            $query->where('status', '=',  $filter['status']);
        }

        if (isset($filter) and !empty($filter['slug'])) {

            $query->where('slug', '=', $filter['slug']);
        }

        $query->orderBy('name');

        return $query;
    }
}
