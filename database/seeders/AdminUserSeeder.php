<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Check if user already exists
        $exists = User::where('email', config('admin.allowed_email'))->exists();
        
        if (!$exists) {
            User::create([
                'name' => 'Admin',
                'email' => config('admin.allowed_email'),
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]);
            
            echo "\n✅ Admin user created successfully!\n";
            echo "Email: " . config('admin.allowed_email') . "\n";
            echo "Password: password123\n";
        } else {
            echo "\n⚠️ Admin user already exists!\n";
        }
    }
}
