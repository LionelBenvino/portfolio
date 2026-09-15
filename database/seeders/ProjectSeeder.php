<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * NOTE: "image" values below are real filenames already present in the
     * persistent storage; this seeder never overwrites uploaded images with
     * null, so re-seeding stays safe for fresh installs.
     */
    public function run(): void
    {
        $projects = [
            [
                'title'       => 'santafe2026.ar AWS Infrastructure',
                'description' => 'Production AWS infrastructure for the institutional website of the 2026 South American Games in Santa Fe. I operate the stack (Application Load Balancer, EC2, RDS and EFS inside a VPC with IAM access control), handling deployments and maintenance through operational runbooks so the site can handle thousands of daily visits during event peaks.',
                'url'         => 'https://santafe2026.ar',
                'keywords'    => 'AWS,EC2,RDS,EFS,ALB,VPC,IAM',
                'image'       => 'santafe2026-aws-architecture.svg',
            ],
            [
                'title'       => 'GCP Data Pipeline',
                'description' => 'Production pipeline consolidating around 130 Google Sheets into BigQuery. The original Apps Script job hit recurring timeouts after more than 30 minutes; I rebuilt it in Python on Cloud Run, reading the sheets in parallel with the batchGet API and writing Parquet files to Cloud Storage. It now finishes in 7 minutes and runs every 15 minutes.',
                'url'         => null,
                'keywords'    => 'GCP,Cloud Run,Cloud Scheduler,Cloud Storage,BigQuery,Python,Parquet',
                'image'       => 'gcp-data-pipeline.svg',
            ],
            [
                'title'       => 'Transcription-as-a-Service',
                'description' => 'Automated transcription service built as a Python web application. It downloads media with yt-dlp, sends audio to AssemblyAI, and presents transcripts directly in the browser.',
                'url'         => null,
                'keywords'    => 'Python,yt-dlp,AssemblyAI,Docker',
                'image'       => 'transcription-architecture.svg',
            ],
            [
                'title'       => 'K3s Home Lab',
                'description' => 'Kubernetes (K3s) home lab for deploying multi-container applications, Portainer, and services exposed through Cloudflare Tunnels under a personal domain.',
                'url'         => null,
                'keywords'    => 'Kubernetes,K3s,Portainer,Cloudflare Tunnels,Docker',
                'image'       => 'k3s-vote.png',
            ],
            [
                'title'       => 'Frontend Portfolio Website',
                'description' => 'CMS-driven portfolio website built with Laravel, Blade, and Filament. Its authenticated admin panel lets the owner create, update, and manage public content.',
                'url'         => 'https://lionelbenvino.com',
                'keywords'    => 'Laravel,Filament,Blade,MySQL,Docker',
                'image'       => 'portfolio-home.png',
            ],
        ];

        Project::query()
            ->whereIn('title', ['React PWA + Supabase self-hosted', 'Open WebUI con RAG'])
            ->delete();

        Project::query()
            ->where('title', 'Dynamic Portfolio Website')
            ->update(['title' => 'Frontend Portfolio Website']);

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                $project,
            );
        }
    }
}
