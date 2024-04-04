<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [];


        for ($i = 1; $i <= 20; $i++) {
            $latitude = mt_rand(-90, 90) + mt_rand() / mt_getrandmax();
            $longitude = mt_rand(-180, 180) + mt_rand() / mt_getrandmax();

            $positions[] = [
                'restaurant_id' => $i,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ];
        }

        DB::table('restaurant_positions')->insert($positions);
    }
}
