<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory (Request $request)
    {
        if ($request->has('menu'))
        {
            Category::create([
                'categoryTitle' => $request->categoryTitle,
                'menu_id' => $request->menu
            ]);

        }else{
            return redirect('/restaurants/'.$request->back)->withErrors('There is no menu to add category in it');
        }

        return redirect('/restaurants/'.$request->back)->with('success', 'Category created successfully');
    }
}
