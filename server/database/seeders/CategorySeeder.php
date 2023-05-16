<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Ноутбуки и компьютеры',
            'parent_id' => null,
        ]);

        Category::create([
            'name' => 'Смартфоны',
            'parent_id' => null,
        ]);

        $c1 = Category::create([
            'name' => 'Аудиотехника',
            'parent_id' => null,
        ]);


        $c1->children()->create([
            'name' => 'Портативное аудио',
            'parent_id' => $c1->getKey(),
        ]);

        $c1->children()->create([
            'name' => 'Музыкальные инструменты',
            'parent_id' => $c1->getKey(),
        ]);

        $c1->children()->create([
            'name' => 'Наушники',
            'parent_id' => $c1->getKey(),
        ]);
    }
}
