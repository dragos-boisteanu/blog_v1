<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke($category, $slug)
    {
        $post = Post::findBySlugOrFail($slug);
        
        return view('post', compact('post'));
    }

}
