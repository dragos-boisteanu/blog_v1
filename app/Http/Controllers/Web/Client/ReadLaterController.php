<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReadLaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $posts = $user->readLaterPosts()->paginate(15);

        return view('read-later', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->readLaterPosts()->attach($request->post_id);

        session()->flash('info', 'Post added to read later list');

        // return Redirect::to(URL::previous() . "#".$request->post_id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->user()->readLaterPosts()->detach($request->post_id);

        session()->flash('info', 'Post removed from read later list');

        // return Redirect::to(URL::previous() . "#".$request->post_id);
        return redirect()->back();
    }
}
