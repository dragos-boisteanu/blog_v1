<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    protected $appends  = array('postsCount');

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getPostsCountAttribute()
    {
        return $this->posts()->count();
    }
}
