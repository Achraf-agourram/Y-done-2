<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Restaurent;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurent>
 */
class RestaurentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurentName' => $this->faker->company,
            'location' => $this->faker->address,
            'capacity' => $this->faker->numberBetween(1, 6),
            'openingTime' => $this->faker->time('H:i'),
            'closingTime' => $this->faker->time('H:i'),
            'isActive' => true,
            'owner_id' => null,
        ];
    }
}
