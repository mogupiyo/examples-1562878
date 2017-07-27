<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'scenario_id', 'active',
    ];

    public function addRecord($request) {
        return $this->updateOrCreate([
            'user_id' => \Auth::user()->id,
            'scenario_id' => $request->scenario_id,
            'active' => true,
        ]);
    }

    public function deleteRecord($id) {
        return $this::where('scenario_id', $id)
                    ->where('user_id', \Auth::user()->id)
                    ->delete();
    }

}
