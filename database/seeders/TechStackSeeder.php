<?php

namespace Database\Seeders;

use App\Models\TechStack;
use Illuminate\Database\Seeder;

class TechStackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * NOTE: "image" is NOT NULL in the schema; we only seed it empty on first
     * creation (firstOrCreate) so re-seeding never overwrites an icon already
     * uploaded through the Filament admin panel.
     */
    public function run(): void
    {
        TechStack::query()->whereIn('name', ['Jenkins', 'Ansible', 'Terraform'])->delete();

        $stacks = [
            ['name' => 'Docker',             'url' => 'https://www.docker.com'],
            ['name' => 'Docker Compose',     'url' => 'https://docs.docker.com/compose'],
            ['name' => 'Traefik',            'url' => 'https://traefik.io'],
            ['name' => 'Nginx',              'url' => 'https://nginx.org'],
            ['name' => 'Kubernetes (K3s)',   'url' => 'https://k3s.io'],
            ['name' => 'GitHub Actions',     'url' => 'https://github.com/features/actions'],
            ['name' => 'Git',                'url' => 'https://git-scm.com'],
            ['name' => 'Google Cloud',       'url' => 'https://cloud.google.com'],
            ['name' => 'AWS',                'url' => 'https://aws.amazon.com'],
            ['name' => 'Linux',              'url' => 'https://ubuntu.com'],
            ['name' => 'MikroTik',           'url' => 'https://mikrotik.com'],
            ['name' => 'Python',             'url' => 'https://www.python.org'],
            ['name' => 'Bash',               'url' => 'https://www.gnu.org/software/bash'],
            ['name' => 'n8n',                'url' => 'https://n8n.io'],
            ['name' => 'Google Apps Script', 'url' => 'https://developers.google.com/apps-script'],
            ['name' => 'BigQuery',           'url' => 'https://cloud.google.com/bigquery'],
            ['name' => 'PostgreSQL',         'url' => 'https://www.postgresql.org'],
            ['name' => 'MySQL',              'url' => 'https://www.mysql.com'],
            ['name' => 'Redis',              'url' => 'https://redis.io'],
            ['name' => 'Cloudflare',         'url' => 'https://www.cloudflare.com'],
            ['name' => 'Portainer',          'url' => 'https://www.portainer.io'],
        ];

        foreach ($stacks as $stack) {
            TechStack::firstOrCreate(
                ['name' => $stack['name']],
                ['url' => $stack['url'], 'image' => ''],
            );
        }
    }
}
