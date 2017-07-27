<?php

namespace App\Http\Controllers\MyPage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Scenario;
use App\Category;
use App\Story;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ScenariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $scenario_model;
    protected $category_model;
    protected $story_model;

    /**
     * Construct ScenariosController
     */
    public function __construct(Scenario $scenario_model, Category $category_model, Story $story_model)
    {
        $this->scenario_model = $scenario_model;
        $this->category_model = $category_model;
        $this->story_model = $story_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $scenarios = $this->scenario_model->getMyRecords();
        } catch (\Exception $e) {
            $errorcd = 'E5202';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }

        $data = compact('scenarios');
        return view('mypage.scenarios.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categories = $this->category_model->getRecords();
        } catch (\Exception $e) {
            $errorcd = 'E5202';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }

        $data = compact('categories');
        return view('mypage.scenarios.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'category_id' => 'required',
            'file' => [
                'file', // アップロードされたファイルであること
                'dimensions:min_width=50,min_height=50,max_width=1980,max_height=1980', // 最小縦横50px 最大縦横1980px
            ]
        ]);

        if($request->file){
            $filename = $request->file->store('public/thumbnail');
            if ($filename) {
                $request->merge(['thumbnail' => basename($filename)]);
            }
        }

        try {
            $this->scenario_model->addRecord($request);
        } catch (\Exception $e) {
            $errorcd = 'E5101';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }

       return redirect('/mypage/scenarios')->with('success', '保存しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $scenario = $this->scenario_model->getRecordById($id);
            $categories = $this->category_model->getRecords();
            $stories = $this->story_model->getRecordsById($id);
        } catch (\Exception $e) {
            $errorcd = 'E5202';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }

        $data = compact('categories', 'scenario', 'stories');
        return view('mypage.scenarios.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $scenario = $this->scenario_model->getRecordById($id);
            $categories = $this->category_model->getRecords();
        } catch (\Exception $e) {
            $errorcd = 'E5202';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }

        $data = compact('categories', 'scenario');
        return view('mypage.scenarios.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUpload(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'category_id' => 'required',
            'file' => [
                // 必須
                // 'required',
                // アップロードされたファイルであること
                'file',
                // 最小縦横50px 最大縦横1980px
                'dimensions:min_width=50,min_height=50,max_width=1980,max_height=1980',
            ]
        ]);

        if ($request->file) {
            $filename = $request->file->store('public/thumbnail');
            if ($filename) {
                $request->merge(['thumbnail' => basename($filename)]);
            }
        }
        $this->scenario_model->updateRecord($request, $id);

        return redirect('/mypage/scenarios/')->with('success', '保存しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($scenario_id)
    {
        #############################################################
        # データの削除を実行。
        #############################################################
        $result = $this->scenario_model->deleteRecord($scenario_id);
        if($result){
            // 削除成功
            return redirect("/mypage/scenarios")->with([
                'result_message' => 'データの削除が完了しました。',
                'result_status' => 'success',
            ]);
        }
        // 削除失敗
        return redirect("/mypage/scenarios")->with([
            'result_message' => 'データの削除に失敗しました。',
            'result_status' => 'failed',
        ]);
    }
}
