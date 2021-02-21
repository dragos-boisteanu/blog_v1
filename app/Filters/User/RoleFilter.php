<?php

namespace App\Filters\User;

use Illuminate\Routing\Route;

class RoleFilter 
{
    public function filter($builder, $value)
    {
        return $builder->where('role_id', $value);
    }
}
