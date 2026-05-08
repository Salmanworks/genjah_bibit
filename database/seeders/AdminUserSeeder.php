<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user with special credentials (only if not exists)
        $admin = User::firstOrCreate(
            ['email' => 'admin@genjah.com'],
            [
                'name' => 'Admin Genjah',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        if ($admin->wasRecentlyCreated) {
            $this->command->info('Admin user created successfully!');
            $this->command->info('Email: admin@genjahbibit.com');
            $this->command->info('Password: admin123');
        } else {
            $this->command->info('Admin user already exists. Skipping creation.');
        }
    }
}
