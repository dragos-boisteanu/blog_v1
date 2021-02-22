<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $roles = [
            'admin' => [1],
            'author' => [1,2],
            'user' => [3]
        ];

        $rolesIds = $roles[$role] ?? [];

        if(Route::currentRouteName() === "admin-users.show" && $request->route('id') == auth()->id()) {
            return $next($request);
        }

        if(!in_array(auth()->user()->role_id, $rolesIds)) {
            abort(403);
        }

        return $next($request);
    }
}
