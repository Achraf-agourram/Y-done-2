<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurent;
use App\Models\User;
use App\Models\Photo;

class RestaurentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owners = User::role('owner')->get();

        foreach ($owners as $owner) {
            Restaurent::factory()
                ->count(1)
                ->has(Photo::factory()->count(rand(2, 6)))
                ->create([
                    'owner_id' => $owner->id,
                ]);
        }
    }
}
