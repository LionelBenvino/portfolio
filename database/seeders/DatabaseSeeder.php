<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Order matters: ExperiencieSeeder creates Experience rows together with
     * their ExperienceTask children, so there is no standalone task seeder.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            EducationSeeder::class,
            TechStackSeeder::class,
            ExperiencieSeeder::class,
            ProjectSeeder::class,
            PostSeeder::class,
        ]);
    }
}
