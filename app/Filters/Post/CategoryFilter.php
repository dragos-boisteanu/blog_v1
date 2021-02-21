<?php

namespace App\Filters\Post;

class CategoryFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('category_id', $value);
    }
}