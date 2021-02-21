<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $postsCount = Post::count();
        $categoriesCount = Category::count();
        $usersCount = User::count();
        $authorsCount = User::where('role_id', 2)->count();
        $adminsCount = User::where('role_id', 1)->count();

        return view('admin.dashboard', compact('postsCount', 'categoriesCount', 'usersCount', 'authorsCount', 'adminsCount'));
    }
}
