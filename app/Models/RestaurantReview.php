<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantReview extends Model
{
    use HasFactory;

    protected $casts = [
        'restaurant_id' => 'integer',
        'rating' => 'integer',
        'rating_text' => 'string',
    ];
}
