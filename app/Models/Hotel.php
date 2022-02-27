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
        'note'
    ];

    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }
}
