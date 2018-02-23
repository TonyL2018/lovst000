<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = User::all()->count();
        if (isset($role)) {
            if (!Auth::user()->hasPermissionTo($role))
            {
                abort('401');
            }
        }
        else{
          abort('401');
        }

        return $next($request);
    }
}
