<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function addRecord($request, $story_id = null) {
        return $this::create([
            'story_id' => $story_id,
            'user_id' => Auth::user()->id,
            'data' => $request->comment
        ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'story_id', 'user_id', 'data',
    ];
}
