<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Category::all() as $category) {
            $match = rand(1, 5);

            for ($i = 0; $i <= $match; $i++) {
                CategoryType::query()->create([
                    'category_id' => $category->id,
                    'title' => fake()->name() . " {$category->title}",
                ]);
            }
        }
    }
}
