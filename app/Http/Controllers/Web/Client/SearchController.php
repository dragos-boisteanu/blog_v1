<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $posts = Post::where(function($query) use ($request) {
        //     if( ($q = $request->q) ) {
        //         $query-
        //     }
        // })->orderBy('created_at', 'desc')->simplePaginate(5);

        $searchData = $request->q;

        if(isset($searchData)) {
            $posts = Post::where('title', 'like', '%'. $searchData . '%')->orderBy('created_at', 'desc')->simplePaginate(5);
        } else {
            $posts = null;
        }
       

        return view('search', compact('posts', 'searchData'));
    }
}
