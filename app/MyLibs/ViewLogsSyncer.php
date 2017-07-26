<?php namespace App\MyLibs;

use App\DailyViewLog as DVL;
use App\DailyViewBatch as DVB;

class ViewLogsSyncer {

    protected $daily_model;
    protected $batch_model;
    protected $latest_one;

    public function scenario()
    {
        $this->daily_model = new DVL();
        $this->batch_model = new DVB();
        $data = $this->daily_model->getRecords();
        $this->batch_model->sync($data);
        return $data;
    }

}
