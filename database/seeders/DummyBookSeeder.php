<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $categories = [
            'horror',
            'comedy',
            'romance'
        ];

        foreach ($categories as $category) {
            $row = Category::create([
                'name' => $category,
            ]);

            for ($i=0; $i < 10; $i++) { 
                $title = $faker->unique()->colorName();
                $row->book()->create([
                    'title' => $title,
                    'code' => Str::snake($title),
                    'author' => $faker->unique()->firstName(),
                    'publisher' => $faker->unique()->firstName(),
                    'publication_year' => mt_rand(1990, 2020),
                    'stock' => mt_rand(0, 150),
                    'synopsis' => $faker->text(),
                    'pdf_file' => '',
                    'cover_image' => '',
                ]);
            }
        }
    }
}
