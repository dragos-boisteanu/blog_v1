<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Filters\Post\PostFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements Viewable
{
    use HasFactory, Sluggable, SoftDeletes, SluggableScopeHelpers, InteractsWithViews;

    protected $fillable = [
        'title',
        'image_url',
        'preview',
        'content',
        'category_id',
        'user_id'
    ];

    protected $with = ['category', 'user'];

    protected $appends = ['isSoftDeleted'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function scopeFilter(Builder $builder, Request $request)
    {
        return ( new PostFilter($request))->filter($builder);
    }
   
    public function getIsSoftDeletedAttribute()
    {
        return isset($this->deleted_at) ? true : false;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-M-Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function viewsCount()
    {
        return views($this)->count();
    }

    public function getStatus() {
        return isset($this->deleted_at) ? false : true;
    }

}
