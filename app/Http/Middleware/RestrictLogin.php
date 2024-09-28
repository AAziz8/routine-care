<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
    // Check if the user is trying to access the default login route
    if ($request->is('login')) {
        // Redirect them to the home page or any other desired route
        return redirect('/');
    }

    return $next($request);
}

}
