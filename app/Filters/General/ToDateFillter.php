<?php

namespace App\Filters\General;

class ToDateFilter 
{
    public function filter($builder, $value)
    {
        return $builder->whereDate('created_at', '<=', $value);
    }
}