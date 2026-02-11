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

    public function getTimes ()
    {
        $times = [];

        $start = \Carbon\Carbon::createFromFormat('H:i:s', $this->opening);
        $end   = \Carbon\Carbon::createFromFormat('H:i:s', $this->closing);

        while ($start <= $end) {
            $times[] = $start->format('H:i');
            $start->addHour();
        }

        return $times;
    }
}
