<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use App\Scenario;
use App\Category;
use App\Story;
use App\DailyViewLog as DPV; // Scenario Page View

class ScenariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $scenario_model;
    protected $category_model;
    protected $dpv_model;

    /**
     * Construct ScenariosController
     */
    public function __construct(Scenario $scenario, Category $category, Story $story, DPV $dpv)
    {
        $this->scenario_model = $scenario;
        $this->category_model = $category;
        $this->story_model = $story;
        $this->dpv_model = $dpv;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $scenarios = $this->scenario_model->getRecords(20, $request->keyword);
            $scenario_ranks = $this->scenario_model->getRecords(10);
            $categories = $this->category_model->getRecords();
        } catch (\Exception $e) {
            $errorcd = 'E5201';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }

        $data = compact('scenarios', 'scenario_ranks', 'categories');
        return view('scenarios.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/scenarios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/scenarios');
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
            $this->dpv_model->addRecord($id, 'scenario');
            $scenario = $this->scenario_model->getRecordById($id);
            $scenario_ranks = $this->scenario_model->getRecords(5);
            $categories = $this->category_model->getRecords();
            $stories = $this->story_model->getRecordsById($id);
        } catch (\Exception $e) {
            $errorcd = 'E5201';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }

        $data = compact('categories', 'scenario', 'scenario_ranks', 'stories');
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
        return redirect('/scenarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('/scenarios');
    }
}
