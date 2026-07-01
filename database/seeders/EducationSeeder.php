<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entries = [
            [
                'education_degree'       => 'Laurea in Ingegneria Elettronica',
                'education_location'     => 'Universidad Nacional de Rosario, Argentina',
                'education_achievements' => '2014',
            ],
            [
                'education_degree'       => 'DevOps Total — Docker, Kubernetes, Jenkins, AWS',
                'education_location'     => 'Udemy',
                'education_achievements' => 'Formazione complementare',
            ],
            [
                'education_degree'       => 'Real-Time DevOps Projects — GitOps, CI/CD, Jenkins, AWS',
                'education_location'     => 'Udemy',
                'education_achievements' => 'Formazione complementare',
            ],
            [
                'education_degree'       => 'MikroTik Installer & Administrator',
                'education_location'     => 'Capecom',
                'education_achievements' => 'Formazione complementare',
            ],
        ];

        foreach ($entries as $entry) {
            Education::updateOrCreate(
                ['education_degree' => $entry['education_degree']],
                $entry
            );
        }
    }
}
