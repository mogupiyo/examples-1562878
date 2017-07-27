<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DailyViewLog as DVL;
use App\ScenarioViewLog as SNVL;
use App\StoryViewLog as STVL;
use App\MyLibs\ViewLogsSyncer as VLS;

class SyncPageViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:syncpv';

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
        try {
            $dvl = new DVL();
            $vls = new VLS($dvl);

            // シナリオviewを同期
            $data = $vls->scenario()->toArray();
            $snvl = new SNVL();
            foreach ($data as $key => $value) {
                $snvl->updateRecord($value['scenario_id'], $value['count']);
            }

            // ストーリーviewを同期
            $data = $vls->story()->toArray();
            $stvl = new STVL();
            foreach ($data as $key => $value) {
                $stvl->updateRecord($value['story_id'], $value['count']);
            }
        } catch (\Exception $e) {
            $errorcd = 'E5202';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            echo \Lang::get("errors.{$errorcd}").':'.$e;
            return false;
        }

        // Dailyテーブルをリセット(truncate)
        $dvl->resetTable();
    }
}
