<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'tour_id',
        'booking_person_phone',
        'booking_person_name',
        'booking_person_email',
        'booking_person_address',
        'booking_date',
        'start_date',
        'adult_number',
        'children_number',
        'baby_number',
        'discount_id',
        'total_price',
        'note',
        'status',
        'payment',
        'payment_status'
    ];
}
