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
        // Create admin user (only if not exists)
        User::firstOrCreate(
            ['email' => 'admin@genjah.com'],
            [
                'name' => 'Admin Genjah',
                'password' => bcrypt('admin123'),
            ]
        );

        // Run all seeders in order
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            ProductSeeder::class,
            TestimonialSeeder::class,
            BlogSeeder::class,
            SettingSeeder::class,
            BannerSeeder::class,
        ]);
    }
}
