<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Scenario;
use App\Category;
use App\Story;
use App\User;

class TopsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $scenario_model;
    protected $category_model;
    protected $story_model;
    protected $user_model;

    /**
     * Construct ScenariosController
     */
    public function __construct(Scenario $scenario_model, Category $category_model, Story $story_model, User $user_model)
    {
        $this->scenario_model = $scenario_model;
        $this->category_model = $category_model;
        $this->story_model = $story_model;
        $this->user_model = $user_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scenarios = $this->scenario_model->getRecords();
        $scenario_ranks = $this->scenario_model->getRecords(5);
        $categories = $this->category_model->getRecords();
        $influence_users = $this->user_model->getInfluenceUsers();
        $data = compact('scenarios', 'scenario_ranks', 'categories', 'influence_users');
        return view('tops.index', $data);
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
        $scenario = $this->scenario_model->getRecordById($id);
        $scenario_ranks = $this->scenario_model->getRecords(5);
        $categories = $this->category_model->getRecords();
        $stories = $this->story_model->getRecordsById($id);
        $data = compact('categories', 'scenario', 'scenario_ranks', 'stories');
        return view('tops.show', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showStory($scenario_id, $story_id)
    {
        $scenario = $this->scenario_model->getRecordById($scenario_id);
        $scenario_ranks = $this->scenario_model->getRecords(5);
        $categories = $this->category_model->getRecords();
        $story = $this->story_model->getRecordById($story_id);
        $data = compact('categories', 'scenario', 'scenario_ranks', 'story');
        return view('tops.show-story', $data);
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
        //
    }
}
