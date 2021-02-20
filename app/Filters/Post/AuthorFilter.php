<?php

namespace App\Filters\Post;

class AuthorFilter {

    public function filter($builder, $value)
    {
        return $builder->where('user_id', $value);
    }
}