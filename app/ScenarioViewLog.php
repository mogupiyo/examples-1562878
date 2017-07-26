<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScenarioViewLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scenario_id', 'count',
    ];

    public static function updateRecord($id) {
    }
}
