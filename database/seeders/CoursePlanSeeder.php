<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\CoursePlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Course::all() as $course) {
            $plansCount = rand(1, 3);
            for ($i = 0; $i <= $plansCount; $i++) {
                CoursePlan::query()->create([
                    'course_id' => $course->id,
                    'total_hours' => 1,
                ]);
            }
        }
    }
}
