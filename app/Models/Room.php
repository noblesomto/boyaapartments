<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Room extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'room_id', 
        'room_title', 
        'room_price',
        'discount_7',
        'discount_30', 
        'room_features',
        'apartment',
        'location', 
        'room_picture',
        'room_description',
        'room_status',
        'bedrooms',
        'beds',
        'baths',
        'guest', 
        'keyword', 
        'meta_description', 
        'views', 
        'featured',
    ];

    public function sluggable(): array
    {
        return [
            'room_slug' => [
                'source' => 'room_title'
            ]
        ];
    }
}
