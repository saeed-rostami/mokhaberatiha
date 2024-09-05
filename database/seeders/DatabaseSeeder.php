<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Note;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => 1,
            'name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'phone_number' => '09332187732',
            'is_admin' => 1
        ]);

        User::factory()->create([
            'id' => 2,
            'name' => 'Regular',
            'last_name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user123'),
            'phone_number' => '09118395667',
            'is_admin' => 0
        ]);

        // Note::factory(100)->create();
    }
}
