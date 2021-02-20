<?php

namespace App\Filters\General;

class IdFilter 
{
    public function filter($builder, $value)
    {
        return $builder->where('id', $value);
    }    
}