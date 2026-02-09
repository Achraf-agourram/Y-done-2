<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [RestaurentController::class, 'home']);
    Route::get('/my-restaurants', [RestaurentController::class, 'myRestaurants']);
    Route::get('/my-restaurants/new', [RestaurentController::class, 'newRestaurant']);
    Route::post('/my-restaurants/new', [RestaurentController::class, 'addRestaurant']);
    Route::get('/restaurants/{id}', [MenuController::class, 'showDefaultMenu']);
    Route::get('/restaurants/{id}/category/{category}', [MenuController::class, 'showMenuWithCategory']);
    Route::get('/restaurant/menu/{id}', [MenuController::class, 'restaurantMenu']);
    Route::get('/restaurant/menu/{id}/category/{category}', [MenuController::class, 'restaurantMenuCategory']);
    Route::post('/addCategory', [CategoryController::class, 'addCategory']);
    Route::post('/addDish', [DishController::class, 'addDish']);
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';
