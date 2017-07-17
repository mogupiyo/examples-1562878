<?php

use Illuminate\Database\Seeder;
use App\Scenario;

class ScenarioTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Scenario::create(
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'テスト脚本',
                'description' => 'テスト用に投稿されたものです。',
                'content' => 'テストテキストテストテキストテストテキストテストテキストテストテキストテストテキストテストテキストテストテキスト',
                'thumbnail' => '',
            ]
        );
    }
}
