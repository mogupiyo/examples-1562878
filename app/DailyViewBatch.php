<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyViewBatch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'scenario_id', 'story_id',
    ];

    public function sync($data)
    {
        // $this->save($data);
    }
}
