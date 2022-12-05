<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => Category::query()->inRandomOrder()->first()->id,
            'title' => fake()->jobTitle,
            'description' => fake()->text,
            'params' => fake()->rgbColorAsArray(),
            'price' => rand(5, 70),
        ];
    }
}
