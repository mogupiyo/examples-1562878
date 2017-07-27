<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryViewLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'story_id', 'count',
    ];

    public function updateRecord($id, $plus_count)
    {
        $data = $this->where('story_id', $id)->first();
        if (count($data) > 0) {
            return $this->where('story_id', $id)->update([
                'count' => $data->count + $plus_count
            ]);
        }
        return $this->create([
            'story_id' => $id,
            'count' => $plus_count
        ]);
    }
}
