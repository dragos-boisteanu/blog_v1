<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable, SoftDeletes, SluggableScopeHelpers;

    // protected $casts = [
    //     'created_at' => 'datetime:d-M-YYYY',
    // ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-M-YYYY');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-M-Y');
    }

    public function user()
    {
        return $this->belongsTo('Models/User');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
