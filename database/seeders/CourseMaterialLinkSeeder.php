<?php

namespace Database\Seeders;

use App\Models\CourseMaterial;
use App\Models\CourseMaterialLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseMaterialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (CourseMaterial::all() as $material) {
            $linksCount = rand(0, 4);
            for ($i = 0; $i < $linksCount; $i++) {
                CourseMaterialLink::query()->create([
                    'course_material_id' => $material->id,
                    'url' => fake()->url(),
                    'title' => fake()->domainName(),
                    'description' => fake()->text(120)
                ]);
            }
        }
    }
}
