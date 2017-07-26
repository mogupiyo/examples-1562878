<?php

namespace App\Http\Controllers\MyPage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Story;
use Illuminate\Support\Facades\Log;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $story_model;

    /**
     * Construct ScenariosController
     */
    public function __construct(Story $story_model)
    {
        $this->story_model = $story_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "show";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = compact('id');
        return view('stories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // var_dump("ok");
        // exit;
        $this->validate($request, [
            'scene' => 'required|max:255',
            'topic' => 'required|max:255',
            'episode' => 'required',
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
            $filename = $request->file->store('public/stories');
            if ($filename) {
                $request->merge(['thumbnail' => basename($filename)]);
            }
        }
        // echo "<pre>";
        // var_dump($request->thumbnail);
        // echo "</pre>";
        // exit;
        try {
            $this->story_model->addRecord($request, $id);
        } catch (\Exception $e) {
            Log::error('データ登録に失敗しました。', [$e]);
        }
        return redirect("/mypage/scenarios/{$id}")->with('success', '保存しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($scenario_id, $story_id)
    {
        $story = $this->story_model->getRecordById($story_id);
        $data = compact('story', 'scenario_id', 'story_id');
        return view('stories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUpload(Request $request, $scenario_id, $story_id)
    {
        $this->validate($request, [
            'scene' => 'required|max:255',
            'topic' => 'required|max:255',
            'episode' => 'required',
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
            $filename = $request->file->store('public/stories');
            if ($filename) {
                $request->merge(['thumbnail' => basename($filename)]);
            }
        }
        $this->story_model->updateRecord($request, $scenario_id, $story_id);

        return redirect("/mypage/scenarios/{$scenario_id}")->with('success', '保存しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($scenario_id, $story_id)
    {
        #############################################################
        # データの削除を実行。
        #############################################################
        $result = $this->story_model->deleteRecord($story_id);
        if($result){
            // 削除成功
            return redirect("/mypage/scenarios/{$scenario_id}")->with([
                'result_message' => 'データの削除が完了しました。',
                'result_status' => 'success',
            ]);
        }
        // 削除失敗
        return redirect("actions/")->with([
            'result_message' => 'データの削除に失敗しました。',
            'result_status' => 'failed',
        ]);
    }
}
