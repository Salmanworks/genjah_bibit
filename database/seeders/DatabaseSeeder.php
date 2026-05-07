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
            'name' => 'Admin Plant Power',
            'email' => 'admin@plantpower.id',
        ]);

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
