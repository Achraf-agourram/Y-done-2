<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->numberBetween(12, 20);

        return [
            'bookingDay' => now()->toDateString(),
            'tables' => $this->faker->numberBetween(1, 2),
            'startHour' => sprintf('%02d:00', $start),
            'endHour' => sprintf('%02d:00', $start + 2),
            'restaurent_id' => null,
        ];
    }
}
