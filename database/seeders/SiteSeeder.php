<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuItem;

class SiteSeeder extends Seeder
{
    public function run()
    {
        Page::factory()->create([
            'slug' => 'about',
            'title' => 'About Us',
        ]);

        Menu::create([
            'name' => 'main',
            'items' => [
                [
                    'title' => 'Blog',
                    'url' => '/blog',
                    'type' => 'internal',
                ],
                [
                    'title' => 'About',
                    'url' => '/about',
                    'type' => 'internal',
                ],
                [
                    'title' => 'Contact',
                    'url' => '/contact',
                    'type' => 'internal',
                ],
            ],
        ]);
    }
}
