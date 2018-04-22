<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()) {
            if (auth()->user()->isAdmin()) {
                $request->merge(['isAdmin' => true]);
                return $next($request);
            } else {
                $request->merge(['isAdmin' => false]);
                return $next($request);
            }
        }
        return redirect(backpack_url('login'));
    }
}
