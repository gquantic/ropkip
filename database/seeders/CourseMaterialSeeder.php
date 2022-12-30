<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\CourseMaterialLink;
use App\Models\CoursePlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Course::all() as $course) {
            $materialsCount = rand(0, 7);
            for ($i = 0; $i <= $materialsCount; $i++) {
                CourseMaterial::query()->create([
                    'course_id' => $course->id,
                    'course_plan_id' => CoursePlan::query()->inRandomOrder()->first()->id,
                    'title' => fake()->title,
                    'description' => fake()->text(120),
                    'duration' => rand(1, 4),
                    'content' => fake()->text(120)
                ]);
            }
        }
    }
}
