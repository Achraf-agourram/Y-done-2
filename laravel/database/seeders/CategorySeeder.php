<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = Menu::all();

        foreach ($menus as $menu) {
            Category::factory()
                ->count(rand(2, 3))
                ->create([
                    'menu_id' => $menu->id,
                ]);
        }
    }
}
