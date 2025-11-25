<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            '時計',
            '家電',
            '食品',
            'ファッション',
            'PC周辺機器',
            '日用品',
            '美容'
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
