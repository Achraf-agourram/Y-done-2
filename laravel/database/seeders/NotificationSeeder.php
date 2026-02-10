<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = Booking::all();

        foreach($bookings as $booking)
        {
            Notification::factory()->create([
                'booking_id' => $booking->id,
                'restaurent_id' => $booking->restaurent_id,
            ]);
        }
    }
}
