<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => $this->faker->firstName,
            'familyName' => $this->faker->lastName,
            'photo' => 'images/' . $this->faker->uuid . '.jpg',
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123',
        ];
    }

    public function client()
    {
        return $this->afterCreating(
            function (User $user) {
                return $user->syncRoles('client');
            }
        );
    }

    public function owner()
    {
        return $this->afterCreating(
            function (User $user) {
                return $user->syncRoles('owner');
            }
        );
    }
}
