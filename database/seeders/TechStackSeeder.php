<?php

namespace Database\Seeders;

use App\Models\TechStack;
use Illuminate\Database\Seeder;

class TechStackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * NOTE: "image" is NOT NULL in the schema; we seed it empty and the icon
     * for each skill is uploaded later through the Filament admin panel.
     */
    public function run(): void
    {
        $stacks = [
            ['name' => 'Docker',             'url' => 'https://www.docker.com'],
            ['name' => 'Docker Compose',     'url' => 'https://docs.docker.com/compose'],
            ['name' => 'Traefik',            'url' => 'https://traefik.io'],
            ['name' => 'Kubernetes (K3s)',   'url' => 'https://k3s.io'],
            ['name' => 'GitHub Actions',     'url' => 'https://github.com/features/actions'],
            ['name' => 'Jenkins',            'url' => 'https://www.jenkins.io'],
            ['name' => 'Google Cloud',       'url' => 'https://cloud.google.com'],
            ['name' => 'AWS',                'url' => 'https://aws.amazon.com'],
            ['name' => 'Ansible',            'url' => 'https://www.ansible.com'],
            ['name' => 'Terraform',          'url' => 'https://www.terraform.io'],
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
            TechStack::updateOrCreate(
                ['name' => $stack['name']],
                ['url' => $stack['url'], 'image' => ''],
            );
        }
    }
}
