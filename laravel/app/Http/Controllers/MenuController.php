<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Booking;
use App\Models\Restaurent;
use Exception;
use Illuminate\Http\Request;
use Throwable;

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
        $restaurant = Restaurent::with(['menu.category.dishes', 'schedule.days', 'bookings'])->findOrFail($id);

        $menu = $restaurant->menu;
        $selectedCategory = $menu->category->first();
        $menu->setRelation('category', $menu->category->slice(1));

        try {
            $todayOpeningTimes = $restaurant->schedule->days->firstWhere('day', date('l'))->getAvailableHours();
            $availableHoursToBook = Booking::getHoursToBook($todayOpeningTimes, $restaurant->capacity, $restaurant->id);

        }catch (Throwable $er) {
            $todayOpeningTimes = [];
            $availableHoursToBook = [];
        }

        return view('restaurantMenu', compact('restaurant', 'menu', 'selectedCategory', 'todayOpeningTimes', 'availableHoursToBook'));
    }

    public function restaurantMenuCategory ($id, $category)
    {
        $restaurant = Restaurent::with(['menu.category.dishes'])->where('owner_id', auth()->id())->findOrFail($id);

        $menu = $restaurant->menu;
        $selectedCategory = Category::with('dishes')->findOrFail($category);
        $menu->setRelation('category', $menu->category->where('id', '!=', $category));

        try {
            $todayOpeningTimes = $restaurant->schedule->days->firstWhere('day', date('l'))->getAvailableHours();
            $availableHoursToBook = Booking::getHoursToBook($todayOpeningTimes, $restaurant->capacity, $restaurant->id);

        }catch (Throwable $er) {
            $todayOpeningTimes = [];
            $availableHoursToBook = [];
        }

        return view('restaurantMenu', compact('restaurant', 'menu', 'selectedCategory', 'todayOpeningTimes', 'availableHoursToBook'));
    }
}
