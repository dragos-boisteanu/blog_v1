<?php

namespace App\Filters\General;

class NameFilter 
{
    public function filter($builder, $value)
    {
        return $builder->where('name', 'like', '%'.$value.'%');
    }
}