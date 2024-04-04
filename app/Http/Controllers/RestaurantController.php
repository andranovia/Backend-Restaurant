<?php

namespace App\Http\Controllers;

use App\Http\Resources\RestaurantInfoResource;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('categories')->with('ratings')->with('positions')->get();
        $restaurantWithCategory = [];

        if (!$restaurants) {
            return response()->json(['error' => 'Restaurant not found'], 404);
        }




        foreach ($restaurants as $restaurant) {


            $restaurantData = [
                'id' => $restaurant->id,
                'title' => $restaurant->title,
                'img' => $restaurant->img,
                'rating' => $restaurant->rating,
                'open' => $restaurant->open,
                'price' => $restaurant->price,
                'created_at' => $restaurant->created_at,
                'updated_at' => $restaurant->updated_at,
                'categories' => $restaurant->categories,
                'ratings' => $restaurant->ratings,

                'average_rating' => $restaurant->averageRatings(),
            ];

            $restaurantWithCategory[] = $restaurantData;
        }



        return response()->json($restaurantWithCategory);
    }

    public function show($id)
    {
        $restaurantsDetail = Restaurant::with('categories')->find($id);

        return response()->json(new RestaurantInfoResource($restaurantsDetail));
    }
}
