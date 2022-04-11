<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'hotline',
        'address',
        'price_per_day',
        'price_per_night',
        'note'
    ];

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'hotel_tour');
    }
}
