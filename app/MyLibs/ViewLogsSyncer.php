<?php namespace App\MyLibs;

use App\DailyViewLog as DVL;

class ViewLogsSyncer {

    protected $daily_model;
    protected $batch_model;
    protected $latest_one;

    public function scenario()
    {
        $this->daily_model = new DVL();
        $data = $this->daily_model->getRecords('scenario_id');
        return $data;
    }

    public function story()
    {
        $this->daily_model = new DVL();
        $data = $this->daily_model->getRecords('story_id');
        return $data;
    }

}
