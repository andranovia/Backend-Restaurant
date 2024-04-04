<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurantCategories = [];


        for ($restaurantId = 1; $restaurantId <= 20; $restaurantId++) {

            $randomCategoryIds = range(1, 20);
            shuffle($randomCategoryIds);


            $numCategories = rand(1, 5);
            $selectedCategoryIds = array_slice($randomCategoryIds, 0, $numCategories);

            foreach ($selectedCategoryIds as $categoryId) {
                $restaurantCategories[] = [
                    'restaurant_id' => $restaurantId,
                    'category_id' => $categoryId,
                ];
            }
        }

        shuffle($restaurantCategories);



        DB::table('category_restaurant')->insert($restaurantCategories);
    }
}
