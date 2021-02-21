<?php

namespace App\Filters\Post;

use App\Filters\Post\IdFilter;
use App\Filters\AbstractFilter;
use App\Filters\General\FromDateFilter;
use App\Filters\General\OrderByFilter;
use App\Filters\Post\TitleFilter;
use App\Filters\General\StatusFilter;
use App\Filters\General\ToDateFilter;
use App\Filters\Post\CategoryFilter;

class PostFilter extends AbstractFilter
{
    protected $filters = [
        'id' => IdFilter::class,
        'title' => TitleFilter::class,
        'category_id' => CategoryFilter::class,
        'status' => StatusFilter::class,
        'from_date' => FromDateFilter::class,
        'to_date' => ToDateFilter::class
    ];
}
