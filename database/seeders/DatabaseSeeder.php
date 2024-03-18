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
        User::factory(1)->create();

        User::factory()->create([
            'name' => 'Demo',
            'username' => 'demo03',
            'email' => 'demo03@caotoc24.com',
            'password' => 'Abcd@123',
            'role' => 3,
            'status' => 1,
            'gender' => 1,
        ]);
    }
}
