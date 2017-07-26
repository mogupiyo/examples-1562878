<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DailyViewLog as DVL;
use App\ScenarioViewLog as SNVL;
use App\StoryViewLog as STVL;
use App\MyLibs\ViewLogsSyncer as VLS;

class SyncerTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:synctest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dvl = new DVL();
        $vls = new VLS($dvl);
        $data = $vls->scenario()->toArray();
        $snvl = new SNVL();
        foreach ($data as $key => $value) {
            // var_dump($value);
            $snvl->updateRecord($value['scenario_id'], $value['count']);
        }
        // var_dump($data);
        // echo $data[count($data)];
        // foreach ($data as $value) {
        //     var_dump($value);
        // }
        $dvl->resetTable();
    }
}
