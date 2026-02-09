<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dishTitle' => $this->faker->words(2, true),
            'price' => $this->faker->randomFloat(2, 5, 50),
            'dishPhoto' => $this->faker->imageUrl(100, 100, 'food'),
            'category_id' => null,
        ];
    }
}
