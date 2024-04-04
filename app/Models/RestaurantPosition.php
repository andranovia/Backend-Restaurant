<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantPosition extends Model
{
    use HasFactory;

    protected $casts = [
        'restaurant_id' => 'integer',
        'latitude' => 'float',
        'longitude' => 'float',
    ];
}
