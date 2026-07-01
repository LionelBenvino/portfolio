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
                'role'        => 'Systems & DevOps Engineer',
                'company'     => 'Governo della Provincia di Santa Fe',
                'company_url' => 'https://www.santafe.gob.ar',
                'start_date'  => '2017',
                'end_date'    => 'Presente',
                'job_type'    => 'remote',
                'tasks'       => [
                    ['title' => 'Pipeline dati containerizzate su GCP', 'description' => 'Cloud Function + Docker per consolidare ~130 Google Sheets in file Parquet su Cloud Storage, caricati in BigQuery via Cloud Scheduler'],
                    ['title' => 'Deploy di servizi containerizzati', 'description' => 'Docker su VPS e cloud con reverse proxy Traefik, HTTPS automatico e routing multi-servizio'],
                    ['title' => 'Pipeline CI/CD con GitHub Actions', 'description' => 'Build, test e deploy automatico di applicazioni containerizzate'],
                    ['title' => 'Automazione di processi operativi', 'description' => 'Python, Bash e Google Apps Script con integrazioni API REST verso Google, AssemblyAI, OpenAI e Gemini'],
                    ['title' => 'Gestione IAM su GCP e AWS', 'description' => 'Configurazione di ruoli, policy di accesso e Google Workspace'],
                    ['title' => 'Amministrazione di server Linux', 'description' => 'Ubuntu/Debian: gestione servizi, performance tuning, cron job, monitoraggio e troubleshooting'],
                    ['title' => 'Monitoraggio e gestione anomalie', 'description' => 'Analisi di log e metriche su Cloud Logging e Looker Studio, alerting su pipeline critiche'],
                    ['title' => 'Troubleshooting di rete end-to-end', 'description' => 'VPN, routing, DHCP, DNS e firewall, dalla diagnosi applicativa fino al network'],
                    ['title' => 'Analisi dati su BigQuery', 'description' => 'Query SQL per reportistica e supporto al business, gestione del data warehouse'],
                    ['title' => 'Supporto applicativo e incident management', 'description' => 'L1/L2 e gestione incident/problem in coordinamento con team infrastrutturali e di sviluppo'],
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
                    ['title' => 'Router MikroTik', 'description' => 'Configurazione e manutenzione: firewall, routing, VPN site-to-site e failover WAN'],
                    ['title' => 'Troubleshooting LAN/WAN', 'description' => 'Diagnosi strutturata di problematiche di rete con documentazione delle soluzioni'],
                ],
            ],
            [
                'role'        => 'Freelance DevOps & Automation',
                'company'     => 'Progetti personali e clienti',
                'company_url' => null,
                'start_date'  => '2024',
                'end_date'    => 'Presente',
                'job_type'    => 'remote',
                'tasks'       => [
                    ['title' => 'Transcription-as-a-Service', 'description' => 'Flask + Docker + AssemblyAI + yt-dlp su VPS, esposto via Cloudflare Tunnel e orchestrato con Google Apps Script'],
                    ['title' => 'Web App React (PWA)', 'description' => 'Supabase self-hosted, Google OAuth, CI/CD via GitHub Actions, deploy su VPS con Traefik'],
                    ['title' => 'Automazione WhatsApp per cliniche', 'description' => 'n8n + Evolution API + Redis + PostgreSQL su home lab con Docker Compose'],
                    ['title' => 'Home lab K3s', 'description' => 'Deploy multi-container, Portainer e servizi esposti via Cloudflare Tunnels sotto dominio personale'],
                    ['title' => 'Open WebUI con RAG', 'description' => 'Assistente AI personale con ChromaDB, containerizzato e deployato su VPS'],
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
