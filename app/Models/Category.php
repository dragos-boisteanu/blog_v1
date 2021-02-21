<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Filters\Category\CategoryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    protected $appends  = array('postsCount');

    public function scopeFilter(Builder $builder, Request $request)
    {
        return ( new CategoryFilter($request))->filter($builder);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getPostsCountAttribute()
    {
        return $this->posts()->count();
    }
}
