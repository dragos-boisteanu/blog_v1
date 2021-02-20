<?php

namespace App\Filters\Category;

use App\Filters\AbstractFilter;
use App\Filters\General\IdFilter;
use App\Filters\General\NameFilter;

class CategoryFilter extends AbstractFilter
{
    protected $filters = [
        'id' => IdFilter::class,
        'name' => NameFilter::class
    ];
}