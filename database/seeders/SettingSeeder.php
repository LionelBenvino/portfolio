<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'name'         => 'Lionel Benvino',
                'title'        => 'Cloud & Infrastructure Engineer',
                'bio'          => "Cloud & Infrastructure Engineer working across AWS, GCP and on-premise Linux environments. I run production infrastructure on AWS, build data pipelines on Google Cloud and deploy containerized services with Docker, Traefik and CI/CD.\n\nI work remotely from Italy in a cross-functional team of three, and I am preparing for the AWS Solutions Architect – Associate certification (target: Q4 2026). My background in Electronic Engineering and networking (VPN, firewalls, routing, MikroTik) helps me troubleshoot production issues across every layer, not just the application.",
                'username'     => 'lionelbenvino',
                'email'        => 'lbenvinoit@gmail.com',
                'phone'        => null,
                'pronouns'     => null,
                'location'     => 'Tuscany, Italy',
                'languages'    => ['es', 'it', 'en'],
                'linkedin_url' => 'https://linkedin.com/in/lionelbenvino',
                'github_url'   => 'https://github.com/LionelBenvino',
                'youtube_url'  => null,
                'hero_gif'     => null,
            ]
        );
    }
}
