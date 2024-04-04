<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantInfoResource extends JsonResource
{

    /**
     * Calculate the average rating manually.
     *
     * @return float|null
     */
    private function calculateAverageRating()
    {
        $ratings = $this->resource->ratings;

        if ($ratings->isEmpty()) {
            return null;
        }

        return $ratings->avg('rating');
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'img' => $this->img,
            'average_rating' => $this->calculateAverageRating(),
            'open' => $this->open,
            'price' => $this->price,
            'categories' => $this->categories,
            'positions' => $this->positions,
            'ratings' => $this->ratings
        ];
    }
}
