<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 
        'room_id',
        'user_id', 
        'checkin', 
        'checkout',
        'guests',
        'days', 
        'amount',
        'payment',
        'book_status',
        'cancel_date',
    ];
}
