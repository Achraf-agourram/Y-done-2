<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            RestaurentSeeder::class,
            MenuSeeder::class,
            CategorySeeder::class,
            DishSeeder::class,
            BookingSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
