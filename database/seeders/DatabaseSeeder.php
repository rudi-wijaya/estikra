<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => config('admin.allowed_email', 'estikra@gmail.com'),
            'password' => bcrypt('030303'),
            'email_verified_at' => now(),
        ]);

        // Create test user
        User::factory()->count(3)->create();
    }
}
