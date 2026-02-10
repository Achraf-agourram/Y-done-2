<?php

namespace Database\Seeders;

use App\Models\Restaurent;
use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = Restaurent::all();

        foreach ($restaurants as $restaurant)
        {
            Booking::factory()->count(10)->create([
                'restaurent_id' => $restaurant->id,
            ]);
        }
    }
}
