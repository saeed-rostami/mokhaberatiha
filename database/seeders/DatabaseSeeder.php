<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
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
            'username' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'mobile' => '989332187732',
            'is_admin' => 1
        ]);

        User::factory()->create([
            'id' => 2,
            'username' => 'Regular',
            'last_name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user123'),
            'mobile' => '989118395667',
            'is_admin' => 0
        ]);

        $cities = json_decode(file_get_contents(resource_path('cities.json')));
        $provinces = json_decode(file_get_contents(resource_path('provinces.json')));

        foreach ($provinces as $province) {

            Province::query()
                ->create([
                    "name" => $province->name
                ]);
        }

        foreach ($cities as $city) {
            City::query()
                ->create([
                    "name" => $city->name,
                    "province_id" => $city->province_id,
                ]);
        }


        // Note::factory(100)->create();
    }
}
