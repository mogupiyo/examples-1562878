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
        try {
            $scenarios = $this->scenario_model->getRecords();
            $scenario_ranks = $this->scenario_model->getRecords(5);
            $categories = $this->category_model->getRecords();
            $influence_users = $this->user_model->getInfluenceUsers();
        } catch (\Exception $e) {
            $errorcd = 'E5101';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }

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
        try {
            $scenario = $this->scenario_model->getRecordById($id);
            $scenario_ranks = $this->scenario_model->getRecords(5);
            $categories = $this->category_model->getRecords();
            $stories = $this->story_model->getRecordsById($id);
        } catch (\Exception $e) {
            $errorcd = 'E5101';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }

        $data = compact('categories', 'scenario', 'scenario_ranks', 'stories');
        return view('tops.show', $data);
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
