<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'bookingDay',
        'tables',
        'startHour',
        'endHour',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurent::class);
    }
}
