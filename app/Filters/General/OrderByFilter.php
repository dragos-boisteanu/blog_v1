<?php

namespace App\Filters\General;

class OrderByFilter
{
    public function filter($builder, $value)
    {
        if(!isset($value)) {
            $value = 6;
        }

        switch($value) {
            case 1: 
                $orderBy = 'title';
                $order = 'asc';
                $builder->orderBy($orderBy, $order);
                break;
            case 2: 
                $orderBy = 'title';
                $order = 'desc';
                $builder->orderBy($orderBy, $order);
                break;
            case 3:
                $builder->orderByUniqueViews();
                break;
            case 4: 
                $builder->orderByUniqueViews('asc');
                break;
            case 5:
                $orderBy = 'created_at';
                $order = 'asc';
                $builder->orderBy($orderBy, $order);
                break;
            case 6:
                $orderBy = 'created_at';
                $order = 'desc';
                break;
            default: 
                $orderBy = 'created_at';
                $order = 'desc';
                $builder->orderBy($orderBy, $order);
        }
        
    }
}