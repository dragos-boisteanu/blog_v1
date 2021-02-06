<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);

        return view('home', compact('posts'));
    }

  
}
