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
        'hotel_id',
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
    // payment: 
    // 1 - thanh toan tai quay
    // 2 - paypal
    // 3 - momo
    // 4 - vnpay

    // payment status
    // 1 - chua thanh toan
    // 2 - da dat coc
    // 3 - da thanh toan
    
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
