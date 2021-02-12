<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $slug)
    {
        $post = Post::findBySlugOrFail($slug);

        $expiresAt = now()->addHours(3);

        views($post)
            ->cooldown($expiresAt)
            ->record();

        return view('post', compact('post'));
    }

}
