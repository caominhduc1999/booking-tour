<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tour_guide_id',
        'hotel_id',
        'image',
        'code',
        'name',
        'type',
        'frequency',
        'departure',
        'destination',
        'is_feature',
        'people_limit',
        'days',
        'adult_price',
        'children_price',
        'baby_price',
        'deposit',
        'transport',
        'description',
        'schedule',
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
