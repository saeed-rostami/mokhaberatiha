<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = json_decode(file_get_contents("resources/cities.json"));
        $provinces = json_decode(file_get_contents("resources/provinces.json"));

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





    }
}
