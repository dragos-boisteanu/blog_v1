<?php

namespace App\Filters\Post;

class TitleFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('title', 'like', '%'.$value.'%');
    }
}