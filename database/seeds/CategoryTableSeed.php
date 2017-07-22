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
            ]
        );
        Category::create(
            [
                'path' => 'comedy',
                'label' => 'コメディ',
            ]
        );
        Category::create(
            [
                'path' => 'age',
                'label' => '時代',
            ]
        );
        Category::create(
            [
                'path' => 'drama',
                'label' => 'ドラマ',
            ]
        );
        Category::create(
            [
                'path' => 'suspense',
                'label' => '推理サスペンス',
            ]
        );
        Category::create(
            [
                'path' => 'fantasy',
                'label' => 'SF・ファンタジー',
            ]
        );
        Category::create(
            [
                'path' => 'horror',
                'label' => 'ホラー',
            ]
        );
    }
}
