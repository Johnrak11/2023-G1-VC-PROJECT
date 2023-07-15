<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categories;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Categories::factory(10)->create();
        // User::factory(5)->create();
        // Event::factory(10)->create();

        $this->call(CategorySeeder::class);
        $this->call(OrganizerSeeder::class);
        $this->call(EventSeeder::class);
      
    }
}
