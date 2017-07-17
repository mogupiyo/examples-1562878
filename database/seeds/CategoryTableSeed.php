<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            [
                'path' => 'love',
                'label' => '恋愛',
            ],
            [
                'path' => 'fantasy',
                'label' => 'ファンタジー',
            ],
            [
                'path' => 'horror',
                'label' => 'ホラー',
            ],
            [
                'path' => 'mistery',
                'label' => 'ミステリー',
            ],
            [
                'path' => 'light-nodel',
                'label' => 'ライトノベル',
            ],
            [
                'path' => 'non-fiction',
                'label' => 'ノンフィクション',
            ]
        );
    }
}
