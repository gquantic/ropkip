<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\CourseMaterialLink;
use App\Models\CoursePlan;
use App\Models\CoursePlanModule;
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
            $duration = [rand(1,4), rand(1,4), rand(1,2)];
            $coursePlans = $course->coursePlans;

            foreach ($coursePlans as $coursePlan) {
                for ($i = 0; $i <= $materialsCount; $i++) {
                    CourseMaterial::query()->create([
                        'course_id' => $course->id,
                        'course_plan_id' => $coursePlan->id,
                        'course_plan_module_id' => CoursePlanModule::query()->inRandomOrder()->first()->id,
                        'title' => fake()->title,
                        'description' => fake()->text(120),
                        'duration' => array_sum($duration),
                        'duration_seminar' => $duration[0],
                        'duration_self' => $duration[1],
                        'duration_exam' => $duration[2],
                        'exam' => fake()->randomElement([
                            'Экзамен',
                            'Тест',
                            'Зачёт'
                        ]),
                        'content' => fake()->text(120)
                    ]);
                }
            }
        }
    }
}
