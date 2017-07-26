<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyViewLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'scenario_id', 'story_id', 'count',
    ];

    public function getRecords() {
        return $this->select(\DB::raw('scenario_id, count("count") as count'))->groupBy('scenario_id')->get();
    }

    public function addRecord($id, $type) {
        // generate uuid from item id, ip address, user-agent and date.
        $uuid = 'item-'.$id.$_SERVER["REMOTE_ADDR"].'-'.$_SERVER['HTTP_USER_AGENT'].'-'.date("YmdH");
        if (count($this->where('uuid', $uuid)->first()) > 0) {
            return false;
        }
        return $this->create([
            'uuid' => $uuid,
            'scenario_id' => ($type === 'scenario') ? $id : null ,
            'story_id' => ($type === 'story') ? $id : null ,
            'count' => 1,
        ]);
    }

    public function resetTable() {
        return $this->truncate();
    }

}
