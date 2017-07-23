<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    protected $user_model;

    /**
     *
     */
    public function __construct(User $user_model) {
        $this->user_model = $user_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user_model->getRecords();
        return view('admin.' .
                    explode('.', \Route::currentRouteName())[0] . '.' .
                    explode('.', \Route::currentRouteName())[1],
                    compact('users')
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
                    explode('.', \Route::currentRouteName())[0] . '.' .
                    explode('.', \Route::currentRouteName())[1],
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
                    explode('.', \Route::currentRouteName())[0] . '.' .
                    explode('.', \Route::currentRouteName())[1],
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
                    explode('.', \Route::currentRouteName())[0] . '.' .
                    explode('.', \Route::currentRouteName())[1],
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
        $this->user_model->approve($id, true);
        return redirect('/console/users');
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
