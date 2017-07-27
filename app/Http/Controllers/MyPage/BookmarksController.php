<?php

namespace App\Http\Controllers\MyPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bookmark;

class BookmarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $bookmark_model;

    /**
     * Construct BookmarksController
     */
    public function __construct(Bookmark $bkm)
    {
        $this->bookmark_model = $bkm;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->bookmark_model->addRecord($request);
        } catch (\Exception $e) {
            $errorcd = 'E5202';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        #############################################################
        # データの削除を実行。
        #############################################################
        try {
            $this->bookmark_model->deleteRecord($id);
        } catch (\Exception $e) {
            $errorcd = 'E5204';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }
        // 削除成功、元の画面へ。
        return redirect()->back();
    }
}
