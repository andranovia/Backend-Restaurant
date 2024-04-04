<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $cast = ['open' => 'integer'];

    public function ratings()
    {
        return $this->hasMany(RestaurantReview::class, 'restaurant_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function averageRatings()
    {
        return $this->ratings->avg('rating');
    }

    public function positions()
    {
        return $this->hasOne(RestaurantPosition::class, 'restaurant_id', 'id');
    }
}
