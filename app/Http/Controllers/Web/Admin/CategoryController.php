<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Category::where( function($query) use ($request) {
            if($id = $request->id) {
                $query->where('id', $id);
            }

            if($name = $request->name) {
                $query->where('name', 'like', '%'.$name.'%');
            }
           
        });

        if(!isset($request->order_by)) {
            $order_by = 1;
        }else {
            $order_by = $request->order_by;
        }

        switch($order_by) {
            case 1: 
                $orderBy = 'name';
                $order = 'asc';
                $query->orderBy($orderBy, $order);
                break;
            case 2: 
                $orderBy = 'name';
                $order = 'desc';
                $query->orderBy($orderBy, $order);
                break;
            case 3:
                $orderBy = 'posts_count';
                $order = 'asc';
                $query->withCount('posts')->orderBy($orderBy, $order);
                break;
            case 4:
                $orderBy = 'posts_count';
                $order = 'desc';
                $query->withCount('posts')->orderBy($orderBy, $order);
                break;
        }

        $categories =  $query->paginate(15);

        $request->flash();

        return view('admin.category.index', compact('categories', 'order_by'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
 
        Category::create($request->all());

        session()->flash('info', 'Category created');

        return redirect()->route('admin-categories.index');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $query = Post::where( function($query) use ($request, $category) {

            $query->where('category_id', $category->id);

            if($post_id = $request->post_id) {
                $query->where('id', $post_id);
            }

            if($title = $request->title) {
                $query->where('title', 'like', '%'.$title.'%');
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

        $authors = User::where('role_id', 1)->orWhere('role_id', 2)->get();

        $request->flash();

        return view('admin.category.show', compact('category', 'posts', 'authors', 'order_by'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
      
        $category->update($request->all());

        return redirect()->route('admin-categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();

        session()->flash('info', 'Category deleted');

        return redirect()->route('admin-categories.index');
    }
}
