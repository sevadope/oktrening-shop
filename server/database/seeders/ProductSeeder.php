<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Ноутбук #1',
                'price' => 200000,
                'image' => '1.avif',
                'category_id' => 1,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Ноутбук #2',
                'price' => 150000,
                'image' => '2.avif',
                'category_id' => 1,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Ноутбук #3',
                'price' => 300000,
                'image' => '3.avif',
                'category_id' => 1,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Ноутбук #4',
                'price' => 350000,
                'image' => '4.avif',
                'category_id' => 1,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Ноутбук #5',
                'price' => 250000,
                'image' => '5.avif',
                'category_id' => 1,
                'priority' => random_int(1, 10),
            ],



            [
                'name' => 'Смартфон #1',
                'price' => 300000,
                'image' => '6.avif',
                'category_id' => 2,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Смартфон #2',
                'price' => 250000,
                'image' => '7.avif',
                'category_id' => 2,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Смартфон #3',
                'price' => 100000,
                'image' => '8.avif',
                'category_id' => 2,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Смартфон #4',
                'price' => 150000,
                'image' => '9.avif',
                'category_id' => 2,
                'priority' => random_int(1, 10),
            ],

            
            
            [
                'name' => 'Колонка #1',
                'price' => 150000,
                'image' => '10.avif',
                'category_id' => 4,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Колонка #2',
                'price' => 100000,
                'image' => '11.avif',
                'category_id' => 4,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Колонка #3',
                'price' => 50000,
                'image' => '12.jpg',
                'category_id' => 4,
                'priority' => random_int(1, 10),
            ],


            
            [
                'name' => 'Синтезатор #1',
                'price' => 200000,
                'image' => '13.avif',
                'category_id' => 5,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Электронная гитара #1',
                'price' => 170000,
                'image' => '14.avif',
                'category_id' => 5,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Электронная ударная установка #1',
                'price' => 450000,
                'image' => '15.avif',
                'category_id' => 5,
                'priority' => random_int(1, 10),
            ],



            [
                'name' => 'Наушники #1',
                'price' => 100000,
                'image' => '16.avif',
                'category_id' => 6,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Наушники #2',
                'price' => 150000,
                'image' => '17.avif',
                'category_id' => 6,
                'priority' => random_int(1, 10),
            ],
            [
                'name' => 'Наушники #3',
                'price' => 200000,
                'image' => '18.avif',
                'category_id' => 6,
                'priority' => random_int(1, 10),
            ],
        ]);
    }
}
