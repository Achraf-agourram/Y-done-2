<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Restaurent;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = Restaurent::all();

        foreach ($restaurants as $restaurant) {
            Menu::factory()
                ->count(1)
                ->create([
                    'restaurent_id' => $restaurant->id,
                ]);
        }
    }
}
