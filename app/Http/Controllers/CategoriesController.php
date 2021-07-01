<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function getCategories()
    {
        $categories = Categories::whereNull('category_id') // we get Parent from here where category_id is null
            ->with('childCategories') // we get child from here 
            ->orderby('title', 'asc')
            ->get();
        return view('categories', compact('categories'));
    }
}