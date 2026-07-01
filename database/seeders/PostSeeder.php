<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Starter post so the blog is not empty. Edit or add more from the Filament
     * admin panel (content is Markdown).
     */
    public function run(): void
    {
        Post::updateOrCreate(
            ['slug' => 'ciao-sono-lionel'],
            [
                'title'        => 'Ciao, sono Lionel — DevOps & Infrastructure Engineer',
                'content'      => <<<'MD'
Benvenuto nel mio blog.

Sono **Lionel Benvino**, ingegnere con oltre 7 anni di esperienza in ambito IT,
oggi focalizzato su **containerizzazione, automazione di infrastrutture e pipeline
CI/CD** in ambienti cloud (GCP e AWS).

Lavoro ogni giorno con:

- **Docker** e **Docker Compose** per servizi containerizzati in produzione
- **Traefik** come reverse proxy con HTTPS automatico
- **GitHub Actions** per pipeline CI/CD
- **Google Cloud** (Cloud Run, Cloud Storage, BigQuery, Cloud Functions)
- **Kubernetes (K3s)** a livello di home lab, in approfondimento

In questo spazio condividerò note tecniche, progetti e cose che imparo lungo il
cammino. Questo è solo il primo post: presto ne arriveranno altri.
MD,
                'published_at' => now(),
                'is_published' => true,
            ]
        );
    }
}
