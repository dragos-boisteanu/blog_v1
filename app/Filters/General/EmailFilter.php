<?php

namespace App\Filters\General;

class EmailFilter 
{
    public function filter($builder, $value)
    {
        return $builder->where('email', 'like', '%'.$value.'%');
    }
}