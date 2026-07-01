<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * NOTE: "image" is nullable; preview screenshots are uploaded later through
     * the Filament admin panel.
     */
    public function run(): void
    {
        $projects = [
            [
                'title'       => 'Transcription-as-a-Service',
                'description' => 'Servizio di trascrizione automatica: Flask + Docker + AssemblyAI + yt-dlp su VPS, esposto via Cloudflare Tunnel e orchestrato con Google Apps Script.',
                'url'         => null,
                'keywords'    => 'Flask,Docker,AssemblyAI,Cloudflare,Python',
            ],
            [
                'title'       => 'React PWA + Supabase self-hosted',
                'description' => 'Web App React (PWA) con Supabase self-hosted, Google OAuth e CI/CD via GitHub Actions, deployata su VPS con reverse proxy Traefik.',
                'url'         => null,
                'keywords'    => 'React,PWA,Supabase,Google OAuth,GitHub Actions,Traefik',
            ],
            [
                'title'       => 'WhatsApp Automation per cliniche',
                'description' => 'Piattaforma di automazione dei messaggi WhatsApp per cliniche: n8n + Evolution API + Redis + PostgreSQL su home lab con Docker Compose.',
                'url'         => null,
                'keywords'    => 'n8n,Evolution API,Redis,PostgreSQL,Docker Compose',
            ],
            [
                'title'       => 'Home Lab K3s',
                'description' => 'Home lab con Kubernetes (K3s): deploy di applicazioni multi-container, Portainer e servizi esposti via Cloudflare Tunnels sotto dominio personale.',
                'url'         => null,
                'keywords'    => 'Kubernetes,K3s,Portainer,Cloudflare Tunnels,Docker',
            ],
            [
                'title'       => 'Open WebUI con RAG',
                'description' => 'Assistente AI personale basato su Open WebUI con RAG (ChromaDB), containerizzato e deployato su VPS.',
                'url'         => null,
                'keywords'    => 'Open WebUI,RAG,ChromaDB,Docker,AI',
            ],
            [
                'title'       => 'GCP Data Pipeline',
                'description' => 'Pipeline dati su Google Cloud: Cloud Function + Docker che consolida ~130 Google Sheets in file Parquet su Cloud Storage e li carica in BigQuery via Cloud Scheduler.',
                'url'         => null,
                'keywords'    => 'GCP,Cloud Functions,BigQuery,Cloud Storage,Parquet,Cloud Scheduler',
            ],
            [
                'title'       => 'Dynamic Portfolio Website',
                'description' => 'Questo sito: portfolio gestito da CMS, costruito con Laravel, Blade e FilamentPHP, containerizzato con Docker e deployato su VPS.',
                'url'         => 'https://lionelbenvino.xyz',
                'keywords'    => 'Laravel,FilamentPHP,Blade,Docker,MySQL',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                $project + ['image' => null],
            );
        }
    }
}
