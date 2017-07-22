<?php

namespace App\Http\Controllers\Admin;

use Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = null;
        return view('admin.' .
                    explode('.', Route::currentRouteName())[0] . '.' .
                    explode('.', Route::currentRouteName())[1],
                    compact($data)
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        return view('admin.' .
                    explode('.', Route::currentRouteName())[0] . '.' .
                    explode('.', Route::currentRouteName())[1],
                    compact($data)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = null;
        return view('admin.' .
                    explode('.', Route::currentRouteName())[0] . '.' .
                    explode('.', Route::currentRouteName())[1],
                    compact($data)
                );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = null;
        return view('admin.' .
                    explode('.', Route::currentRouteName())[0] . '.' .
                    explode('.', Route::currentRouteName())[1],
                    compact($data)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
