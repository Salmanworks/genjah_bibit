<?php

require dirname(__DIR__).'/vendor/autoload.php';
$app = require_once dirname(__DIR__).'/bootstrap/app.php';

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$email = 'admin@genjah.com';
$password = 'admin123';

$user = User::where('email', $email)->first();

if (!$user) {
    $user = User::create([
        'name' => 'Super Admin',
        'email' => $email,
        'password' => Hash::make($password),
        'is_admin' => true,
    ]);
    echo "Admin created successfully!\n";
} else {
    $user->update([
        'is_admin' => true,
        'password' => Hash::make($password),
    ]);
    echo "Admin updated successfully!\n";
}

echo "Email: $email\n";
echo "Password: $password\n";
