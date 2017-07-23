<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoriesController extends Controller
{

    protected $category_model;

    /**
     *
     */
    public function __construct(Category $category_model) {
        $this->category_model = $category_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category_model->getRecords();
        return view('admin.' .
                    explode('.', \Route::currentRouteName())[0] . '.' .
                    explode('.', \Route::currentRouteName())[1],
                    compact('categories')
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.' .
                    explode('.', \Route::currentRouteName())[0] . '.' .
                    explode('.', \Route::currentRouteName())[1],
                    compact('')
                );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $this->category_model->addRecord($request);
        return redirect('/console/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // unused
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category_model->getRecordById($id);
        return view('admin.' .
                    explode('.', \Route::currentRouteName())[0] . '.' .
                    explode('.', \Route::currentRouteName())[1],
                    compact('category')
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = $this->category_model->updateRecordById($request, $id);
        return redirect('/console/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category_model->deleteRecordById($id);
        return redirect('/console/categories');
    }
}
