<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurent;
use Exception;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function showDefaultMenu ($id)
    {
        $restaurant = Restaurent::with(['menu.category.dishes'])->where('owner_id', auth()->id())->findOrFail($id);
        $menu = $restaurant->menu;

        try{
            $selectedCategory = $menu->category->first();
            $menu->setRelation('category', $menu->category->slice(1));

        }catch(Exception $er){
            $selectedCategory = null;
        }

        return view('menu', compact('restaurant', 'menu', 'selectedCategory'));
    }

    public function showMenuWithCategory ($id, $category)
    {
        $restaurant = Restaurent::with(['menu.category.dishes'])->where('owner_id', auth()->id())->findOrFail($id);
        $menu = $restaurant->menu;

        $selectedCategory = Category::with('dishes')->findOrFail($category);
        $menu->setRelation('category', $menu->category->where('id', '!=', $category));

        return view('menu', compact('restaurant', 'menu', 'selectedCategory'));
    }

    public function restaurantMenu ($id)
    {
        $restaurant = Restaurent::with(['menu.category.dishes'])->findOrFail($id);
        $menu = $restaurant->menu;

        $selectedCategory = $menu->category->first();
        $menu->setRelation('category', $menu->category->slice(1));

        return view('restaurantMenu', compact('restaurant', 'menu', 'selectedCategory'));
    }

    public function restaurantMenuCategory ($id, $category)
    {
        $restaurant = Restaurent::with(['menu.category.dishes'])->where('owner_id', auth()->id())->findOrFail($id);
        $menu = $restaurant->menu;

        $selectedCategory = Category::with('dishes')->findOrFail($category);
        $menu->setRelation('category', $menu->category->where('id', '!=', $category));

        return view('restaurantMenu', compact('restaurant', 'menu', 'selectedCategory'));
    }
}
