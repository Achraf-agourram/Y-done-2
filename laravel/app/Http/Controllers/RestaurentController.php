<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantRequest;
use App\Models\Restaurent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurentController extends Controller
{
    public function home ()
    {
        $restaurants = Restaurent::with(['photos', 'owner'])->get();

        return view('home', compact('restaurants'));
    }

    public function myRestaurants ()
    {
        $restaurants = auth()->user()
                        ->restaurants()
                        ->where('isActive', true)
                        ->with('photos')
                        ->get();

        return view('myrestaurants', compact('restaurants'));
    }

    public function newRestaurant ()
    {
        return view('restauForm');
    }

    public function addRestaurant (StoreRestaurantRequest $request)
    {
        $restaurant = new Restaurent();

        $restaurant->fill($request->safe()->only([
            'restaurentName',
            'location',
            'capacity',
        ]));
        
        $restaurant->isActive = true;
        $restaurant->remaining = $restaurant->capacity;
        $restaurant->owner_id = Auth::id();

        $restaurant->save();

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('images', 'public');

                $restaurant->photos()->create([
                    'photoContent' => $path,
                ]);
            }
        }

        $restaurant->menu()->create();

        return redirect('/my-restaurants')->with('success', 'Your Restaurant was added succesfully !');
    }

}
