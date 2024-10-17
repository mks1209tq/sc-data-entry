<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Models\Passport;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'a@a.com',
            'password' => '$2y$12$kt6DH3V.hOsZxbIJLNZFEOIaUPB4dSyJL1hepO8GSmE1UgMXvtp3q',
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@a.com',
            'password' => '$2y$12$kt6DH3V.hOsZxbIJLNZFEOIaUPB4dSyJL1hepO8GSmE1UgMXvtp3q',
        ]);

        User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@a.com',
            'password' => '$2y$12$kt6DH3V.hOsZxbIJLNZFEOIaUPB4dSyJL1hepO8GSmE1UgMXvtp3q',
        ]);

    }   
}
