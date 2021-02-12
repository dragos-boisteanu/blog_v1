<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category)
    {
        $category = Category::where('name', $category)->first();

        $posts = $category->posts()->simplePaginate(5);

        return view('category', compact('posts', 'category'));
    }
}
