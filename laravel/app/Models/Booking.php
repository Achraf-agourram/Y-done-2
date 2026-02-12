<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public static function getHoursToBook (array $availableHours, int $capacity): array
    {
        $hoursToBook = [];

        foreach ($availableHours as $hour)
        {
            if (self::where('startHour', Carbon::createFromFormat('H:i', $hour)->format('H:i:s'))->where('bookingDay', )->count() < $capacity) $hoursToBook[] = $hour;
        }

        return $hoursToBook;
    }
}
