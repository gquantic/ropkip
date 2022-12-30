<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CourseMaterialLink;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::query()->create([
           'name' => 'Murad',
           'email' => 'gapurovich05@mail.ru',
           'password' => Hash::make('@muraa005'),
        ]);

        \App\Models\Category::factory()
            ->count(10)
            ->create();

        $this->call([
            CategoryTypesSeeder::class,
        ]);

        \App\Models\Course::factory()
            ->count(10)
            ->create();

        $this->call([
            CoursePlanSeeder::class,
            CourseMaterialSeeder::class,
        ]);

        $this->call([
            CourseMaterialLinkSeeder::class,
        ]);
    }
}
