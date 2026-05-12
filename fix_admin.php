<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== Fix Admin Access ===\n\n";

$admin = App\Models\User::where('email', 'admin@genjah.com')->first();
if ($admin) {
    $admin->is_admin = true;
    $admin->save();
    echo "✓ Admin user updated\n";
    echo "Email: {$admin->email}\n";
    echo "Is Admin: " . ($admin->is_admin ? 'Yes' : 'No') . "\n";
} else {
    echo "Admin user not found\n";
}
