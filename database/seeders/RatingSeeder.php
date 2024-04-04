<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rating = [];

        for ($restaurantId = 1; $restaurantId <= 20; $restaurantId++) {

            $numRatings = ($restaurantId % 2 === 0) ? 2 : 1;
            for ($i = 0; $i < $numRatings; $i++) {
                $rating[] = [
                    'restaurant_id' => $restaurantId,
                    'user_id' => $i + 1,
                    'user_name' => 'User ' . ($i + 1),
                    'rating' => rand(3, 5),
                    'rating_text' => 'Random rating text for restaurant ' . $restaurantId,
                ];
            }
        }

        DB::table('restaurant_reviews')->insert($rating);
    }
}
