<?php

namespace App\Filters\User;

class RoleFilter 
{
    public function filter($builder, $value)
    {
        return $builder->where('role_id', $value);
    }
}
