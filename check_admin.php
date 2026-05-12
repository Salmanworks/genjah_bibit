<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== Cek Admin User ===\n\n";
$admin = App\Models\User::where('email', 'admin@genjah.com')->first();
if ($admin) {
    echo "Admin User Ditemukan:\n";
    echo "ID: {$admin->id}\n";
    echo "Email: {$admin->email}\n";
    echo "Name: {$admin->name}\n";
    echo "Is Admin: " . ($admin->is_admin ? 'Yes' : 'No') . "\n";
    echo "Created At: {$admin->created_at}\n";
} else {
    echo "Admin User TIDAK ditemukan\n";
}

echo "\n=== Semua Users ===\n";
$users = App\Models\User::all(['id', 'email', 'name', 'is_admin']);
foreach ($users as $user) {
    echo "{$user->id} - {$user->email} - {$user->name} - Admin: " . ($user->is_admin ? 'Yes' : 'No') . "\n";
}
