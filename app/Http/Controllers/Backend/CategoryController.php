<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, $route = null)
    {

        $filter = [
            'search' => $request->get('search'),
            'status' => $request->get('status'),
        ];

        $categories = CategoryRepository::getCategories($filter)->paginate(20);


        return view('backend.records.table_categories', [
            'route' => $route,
            'categories' => $categories
        ])->withErrors('Oops! no existe registro para mostrar');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($route = null)
    {
        return view('backend.forms.forms_category', [
            'route' => $route
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category = Category::where('name', '=', $request->name)->first();

        if ($category instanceof Category) {
            return response()->json(['status' => 'fail', 'alert' => env('MSJ_FAIL')]);
        }

        Category::saveCategory($request);

        return response()->json(['status' => 'success', 'alert' => env('MSJ_SUCCESS'), 'create' => true, 'update' => false]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $route = null)
    {
        $category = Category::where('id', '=', $id)->first();

        return view('backend.forms.forms_category', [
            'route' => $route,
            'category' => $category
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $category = Category::updateCategory($request);

        if ($category) {
            return response()->json(['status' => 'success', 'alert' => env('MSJ_SUCCESS')]);
        }

        return response()->json(['status' => 'success', 'alert' => env('MSJ_FAIL')]);
    }
}
