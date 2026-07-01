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
                'title'        => 'DevOps & Infrastructure Engineer',
                'username'     => 'lionelbenvino',
                'email'        => 'lbenvinoit@gmail.com',
                'phone'        => null,
                'pronouns'     => null,
                'location'     => 'Lajatico (PI), Italia',
                'languages'    => ['es', 'it', 'en'],
                'linkedin_url' => 'https://linkedin.com/in/lionelbenvino',
                'github_url'   => 'https://github.com/LionelBenvino',
                'youtube_url'  => null,
                'hero_gif'     => null,
            ]
        );
    }
}
