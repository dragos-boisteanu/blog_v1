<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Post::where( function($query) use ($request) {
            if($id = $request->id) {
                $query->where('id', $id);
            }

            if($title = $request->title) {
                $query->where('title', 'like', '%'.$title.'%');
            }

            if($categoryId = $request->category_id) {
                $query->where('category_id', $categoryId);
            }

            if($authorId = $request->author_id) {
                $query->where('user_id', $authorId);
            }

            if($status = $request->status) {
                if($status == 1) {
                    $query->whereNull('deleted_at');
                } else {
                    $query->whereNotNull('deleted_at');
                }
            }

            if($fromDate = $request->from_date) {
                $query->whereDate('created_at', '>=', $fromDate);
            } else if($toDate = $request->to_date) {
                $query->whereDate('created_at', '<=', $toDate);
            } else if ($fromDate = $request->from_date && $toDate = $request->to_date) {
                $query->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate);
            }
           
        });

        if(!isset($request->order_by)) {
            $order_by = 6;
        }else {
            $order_by = $request->order_by;
        }

        switch($order_by) {
            case 1: 
                $orderBy = 'title';
                $order = 'asc';
                $query->orderBy($orderBy, $order);
                break;
            case 2: 
                $orderBy = 'title';
                $order = 'desc';
                $query->orderBy($orderBy, $order);
                break;
            case 3:
                $query->orderByUniqueViews();
                break;
            case 4: 
                $query->orderByUniqueViews('asc');
                break;
            case 5:
                $orderBy = 'created_at';
                $order = 'asc';
                $query->orderBy($orderBy, $order);
                break;
            case 6:
                $orderBy = 'created_at';
                $order = 'desc';
                break;
            default: 
                $orderBy = 'created_at';
                $order = 'desc';
                $query->orderBy($orderBy, $order);
        }

        $posts = $query->withTrashed()->paginate(15);

        $categories = Category::all();
        $authors = User::where('role_id', '1')->orWhere('role_id', '2')->get();
    
        $request->flash();

        return view('admin.post.index', compact('posts', 'categories', 'authors', 'order_by'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $input = $request->all();

        $input['user_id'] = Auth::id();

        Post::create($input);

        session()->flash('info', 'The post was deleted');

        return redirect()->route('admin-posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        
        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        
        if (!Gate::allows('update-post', $post)) {
            abort(403);
        }

        $post->update($request->all());
        
        session()->flash('info', 'The post was updated');

        return redirect()->route('admin-posts.edit');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        session()->flash('info', 'The post was deleted');

        return redirect()->route('admin-posts.index');
    }
}
