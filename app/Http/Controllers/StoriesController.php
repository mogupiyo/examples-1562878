<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Scenario;
use App\Category;
use App\Story;
use App\User;
use App\DailyViewLog as DPV; // Scenario Page View

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $scenario_model;
    protected $category_model;
    protected $story_model;
    protected $user_model;
    protected $dpv_model;

    /**
     * Construct ScenariosController
     */
    public function __construct(Scenario $scenario, Category $category, Story $story, User $user, DPV $dpv)
    {
        $this->scenario_model = $scenario;
        $this->category_model = $category;
        $this->story_model = $story;
        $this->user_model = $user;
        $this->dpv_model = $dpv;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->back();
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
    public function show($scenario_id, $story_id)
    {
        try {
            $this->dpv_model->addRecord($story_id, 'story');
            $scenario = $this->scenario_model->getRecordById($scenario_id);
            $scenario_ranks = $this->scenario_model->getRecords(5);
            $categories = $this->category_model->getRecords();
            $story = $this->story_model->getRecordById($story_id);
        } catch (\Exception $e) {
            $errorcd = 'E5101';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }
        $data = compact('categories', 'scenario', 'scenario_ranks', 'story');
        return view('stories.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->back();
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
}
