<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Seo::count() == 0) {
            Seo::create([
                'title' => 'PemWeb - Website Services',
                'description' => 'Explore services offered by PemWeb, a digital agency specializing in web development.',
                'keywords' => 'web development, PemWeb, Laravel, services, portfolio, digital agency',
                'canonical_url' => 'https://www.pemweb.com',
                'robots' => 'index, follow',
                'og_image' => '', // You can put a default image path
            ]);
        }
    }
}
