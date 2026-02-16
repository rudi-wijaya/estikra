<?php
require 'vendor/autoload.php';

use Illuminate\Support\Facades\Hash;

// Get user from database
$user = \App\Models\User::where('email', 'estikra@gmail.com')->first();

if ($user) {
    echo "Email: {$user->email}\n";
    echo "Password Hash: {$user->password}\n";
    echo "Match 030303: " . (Hash::check('030303', $user->password) ? 'YES' : 'NO') . "\n";
} else {
    echo "User not found\n";
}
