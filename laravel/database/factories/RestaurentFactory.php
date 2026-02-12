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
        $capacity = $this->faker->numberBetween(10, 20);
        
        return [
            'restaurentName' => $this->faker->company,
            'location' => $this->faker->address,
            'capacity' => $capacity,
            'isActive' => true,
            'removed' => false,
            'owner_id' => null,
        ];
    }
}
