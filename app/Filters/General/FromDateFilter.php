<?php 

namespace App\Filters\General;

class FromDateFilter 
{
    public function filter($builder, $value)
    {
        return $builder->whereDate('created_at', '>=', $value);
    }
}