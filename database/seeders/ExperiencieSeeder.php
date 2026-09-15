<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperiencieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Seeds each Experience together with its ExperienceTask rows. Tasks are
     * wiped and recreated on every run so re-seeding stays idempotent.
     */
    public function run(): void
    {
        $experiences = [
            [
                'role'        => 'Cloud & Linux Systems Engineer',
                'company'     => 'Government of Santa Fe Province, Argentina',
                'company_url' => 'https://www.santafe.gob.ar',
                'start_date'  => '2017',
                'end_date'    => 'Present',
                'job_type'    => 'remote',
                'tasks'       => [
                    ['title' => 'AWS production infrastructure', 'description' => 'Operating EC2, RDS, EFS, ALB, IAM and VPC for the institutional website santafe2026.ar, handling deployments and maintenance through operational runbooks'],
                    ['title' => 'GCP data pipeline', 'description' => 'Redesigned a pipeline consolidating 130 sources, migrating it from Apps Script to Python on Cloud Run: runtime cut from over 30 minutes with recurring timeouts to 7 minutes, now running every 15 minutes'],
                    ['title' => 'Automated transcription system', 'description' => 'Designed and deployed an end-to-end system with Docker, Flask, AssemblyAI and Google Drive that processed over 2,500 hours of content in its first full month'],
                    ['title' => 'Linux server administration', 'description' => 'Ubuntu/Debian servers on-premise and in the cloud: services, configuration, logs, performance, basic hardening and Bash scripting'],
                    ['title' => 'Containerized services', 'description' => 'Docker deployments on VPS with Traefik and Nginx reverse proxies and Cloudflare tunnels'],
                    ['title' => 'Automation and integrations', 'description' => 'Python and Bash automation for recurring workflows, with REST API and Google API integrations'],
                    ['title' => 'Cross-ministry delivery', 'description' => 'Requirements gathering and project delivery with stakeholders from several ministries, plus technical documentation and runbooks'],
                ],
            ],
            [
                'role'        => 'Network & Infrastructure Technician',
                'company'     => 'Taller IT (Freelance)',
                'company_url' => null,
                'start_date'  => '2023',
                'end_date'    => '2025',
                'job_type'    => 'onsite',
                'tasks'       => [
                    ['title' => 'MikroTik routers', 'description' => 'Configuration and maintenance of firewall, routing, VPN and WAN failover for 20 to 30 end clients'],
                    ['title' => 'LAN/WAN troubleshooting', 'description' => 'Diagnosis and resolution of LAN and WAN issues'],
                ],
            ],
            [
                'role'        => 'Freelance DevOps & Automation',
                'company'     => 'Personal and client projects',
                'company_url' => null,
                'start_date'  => '2024',
                'end_date'    => 'Present',
                'job_type'    => 'remote',
                'tasks'       => [
                    ['title' => 'Transcription-as-a-Service', 'description' => 'Python web application that downloads media with yt-dlp, transcribes it with AssemblyAI and shows transcripts in the browser'],
                    ['title' => 'WhatsApp automation for clinics', 'description' => 'n8n, Evolution API, Redis and PostgreSQL on a Docker Compose home lab'],
                    ['title' => 'K3s home lab', 'description' => 'Multi-container deployments, Portainer and services exposed through Cloudflare Tunnels under a personal domain'],
                ],
            ],
        ];

        foreach ($experiences as $data) {
            $tasks = $data['tasks'];
            unset($data['tasks']);

            $experience = Experience::updateOrCreate(
                ['role' => $data['role'], 'company' => $data['company']],
                $data,
            );

            $experience->tasks()->delete();
            $experience->tasks()->createMany($tasks);
        }
    }
}
