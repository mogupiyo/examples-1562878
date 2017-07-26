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

    public function updateRecord($id, $plus_count)
    {
        $data = $this->where('scenario_id', $id)->first();
        if (count($data) > 0) {
            return $this->where('scenario_id', $id)->update([
                'count' => $data->count + $plus_count
            ]);
        }
        return $this->create([
            'scenario_id' => $id,
            'count' => $plus_count
        ]);
    }
}
