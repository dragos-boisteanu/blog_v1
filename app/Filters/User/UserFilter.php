<?php


namespace App\Filters\User;

use App\Filters\AbstractFilter;
use App\Filters\General\EmailFilter;
use App\Filters\User\RoleFilter;
use App\Filters\General\IdFilter;
use App\Filters\General\NameFilter;
use App\Filters\General\StatusFilter;
class UserFilter extends AbstractFilter
{
   protected $filters = [
      'id' => IdFilter::class,
      'name' => NameFilter::class,
      'email' => EmailFilter::class,
      'role_id' => RoleFilter::class,
      'status' => StatusFilter::class
   ];
}