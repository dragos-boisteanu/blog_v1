<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
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
        'image_url',
        'preview',
        'content',
    ];

    protected $with = ['category', 'user'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
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
}
