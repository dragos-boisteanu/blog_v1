<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestrictAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role_id == 2) {
            if($request->route('id') == Auth::id()) {
                return $next($request);
            }else {
                abort(403);
            }
        }else if(Auth::user()->role_id == 1){
            return $next($request);
        } else {
            // redirect()->route('dashboard.index');
            abort(403);
        }
       
    }
}
