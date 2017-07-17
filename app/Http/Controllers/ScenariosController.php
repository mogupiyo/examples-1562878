<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Scenario;
use App\Category;
use Illuminate\Support\Facades\Log;

class ScenariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $scenario_model;
    protected $category_model;

    /**
     * Construct ScenariosController
     */
    public function __construct(Scenario $scenario_model, Category $category_model)
    {
        $this->scenario_model = $scenario_model;
        $this->category_model = $category_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scenarios = $this->scenario_model->getRecords();
        $data = compact('scenarios');
        return view('scenarios.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category_model->getRecords();
        $data = compact('categories');
        return view('scenarios.create', $data);
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
            'content' => 'required',
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 最小縦横50px 最大縦横1980px
                'dimensions:min_width=50,min_height=50,max_width=1980,max_height=1980',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $filename = $request->file->store('public/thumbnail');
            if ($filename) {
                $request->merge(['thumbnail' => basename($filename)]);
            }
            try {
                $this->scenario_model->addRecord($request);
            } catch (\Exception $e) {
                Log::error('データ取得に失敗しました。', [$e]);
            }


            return redirect('/mypage/scenarios/')->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '不正な画像データです。']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scenario = $this->scenario_model->getRecordById($id);
        $categories = $this->category_model->getRecords();
        $data = compact('categories', 'scenario');
        return view('scenarios.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scenario = $this->scenario_model->getRecordById($id);
        $categories = $this->category_model->getRecords();
        $data = compact('categories', 'scenario');
        return view('scenarios.edit', $data);
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
            'content' => 'required',
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
    public function destroy($id)
    {
        //
    }
}
