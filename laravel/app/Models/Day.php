<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'opening',
        'closing',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function getTodayOpeningHours (): array
    {
        $times = [];

        $start = \Carbon\Carbon::createFromFormat('H:i:s', $this->opening);
        $end   = \Carbon\Carbon::createFromFormat('H:i:s', $this->closing)->subHour();

        while ($start <= $end) {
            $times[] = $start->format('H:i');
            $start->addHour();
        }

        return $times;
    }

    public function getAvailableHours (): array
    {
        $availableHours = [];

        foreach ($this->getTodayOpeningHours() as $hour)
        {
            if ($hour > date('H:i')) $availableHours[] = $hour;
        }

        return $availableHours;
    }
}
