<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDishRequest;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function addDish (StoreDishRequest $request)
    {
        $dish = new Dish();

        $dish->fill($request->safe()->only([
            'dishTitle',
            'price',
        ]));
        $dish->category_id = $request->selectedCategory;
        $dish->dishPhoto = $request->file('dishPhoto')->store('images', 'public');

        $dish->save();

        return redirect('/restaurants/'.$request->back.'/category/'.$request->selectedCategory)->with('success', 'Dish added successfully');
    }
}
