<?php

namespace App\Http\Controllers\MyPage;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * メンバ変数
     */
    protected $user_model;

    /**
     * Construct AuthController
     */
    public function __construct(User $user_model)
    {
        $this->user_model = $user_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit');
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
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back();
    }

    /**
     * 映画・TV関係者であるフラグを更新するリクエスト
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filmRelated(Request $request)
    {
        try {
            $this->user_model->updateFilmRelated(Auth::user()->id, true);
            return redirect('/mypage/user');
        } catch (\Exception $e) {
            $errorcd = 'E5002';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'file' => [
                'file', // アップロードされたファイルであること
                'dimensions:min_width=50,min_height=50,max_width=1980,max_height=1980', // 最小縦横50px 最大縦横1980px
            ]
        ]);

        try {

            $user = User::find(auth()->id());
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->gender != "") {
                $user->gender = $request->gender;
            }
            $user->birthday = $request->birthday;
            if ($request->file) {
                $filename = $request->file->store('public/avatar');
                $user->avatar = basename($filename);
            }

            $user->save();

            return redirect('/mypage/user')->with('success', '保存しました。');
        } catch (\Exception $e) {
            $errorcd = 'E5003';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => \Lang::get("errors.{$errorcd}")]);
        }
    }
}
