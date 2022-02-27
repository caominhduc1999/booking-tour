<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tour_id',
        'booking_date',
        'start_date',
        'adult_number',
        'children_number',
        'baby_number',
        'discount_id',
        'totla_price',
        'note',
        'status',
        'payment',
        'payment_status'
    ];
}
