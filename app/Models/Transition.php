<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    use HasFactory;

    protected $table = 'transitions';

    protected $fillable = [
        'booking_id',
        'transaction_code',
        'amount',
        'payment_method'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
