<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CoursePlan;
use App\Models\CoursePlanModule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursePlanModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Course::all() as $course) {
            $plans = $course->coursePlans;

            foreach ($plans as $plan) {
                $courseModules = rand(2,4);
                for ($i = 0; $i <= $courseModules; $i++) {
                    CoursePlanModule::query()->create([
                        'course_id' => $course->id,
                        'course_plan_id' => $plan->id,
                        'title' => fake()->jobTitle,
                    ]);
                }
            }
        }
    }
}
