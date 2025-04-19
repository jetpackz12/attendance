<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'fullname' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'authorized_page' => '1, 2, 3, 4, 5, 6'
        ]);

        User::factory()->create([
            'fullname' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => Hash::make('123'),
            'authorized_page' => '1, 3, 4'
        ]);
    }
}
