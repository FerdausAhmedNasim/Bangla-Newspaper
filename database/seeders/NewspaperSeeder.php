<?php

namespace Database\Seeders;

use App\Models\Newspaper;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewspaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Newspaper::create([
            'title' => 'The Daily Times',
            'headlines' => 'Breaking News: Major Event Unfolds',
            'hero_section' => 'A major event is taking place that will change the world...',
            'banner' => 'banners/daily-times-banner.jpg',
            'description' => 'This is a detailed description of the news event happening today.',
            'image' => 'images/daily-times.jpg',
            'video' => 'videos/daily-times.mp4',
        ]);

        Newspaper::create([
            'title' => 'Global Gazette',
            'headlines' => 'New Discoveries in Science',
            'hero_section' => 'Scientists have uncovered groundbreaking research...',
            'banner' => 'banners/global-gazette-banner.jpg',
            'description' => 'A deep dive into the scientific breakthrough that is changing perspectives.',
            'image' => 'images/global-gazette.jpg',
            'video' => 'videos/global-gazette.mp4',
        ]);
    }
}