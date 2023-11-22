<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ebook;
use App\Models\Story;
use App\Models\Subscriber;
use App\Models\AnnualForum;
use App\Models\Announcement;
use App\Models\UpcomingEvent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Announcement::factory(10)->create();
        // UpcomingEvent::factory(10)->create();
        // AnnualForum::factory(10)->create();
        // Story::factory(10)->create();
        // Ebook::factory(10)->create();
        Subscriber::factory(10)->create();
    }
}
