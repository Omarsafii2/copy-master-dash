<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotCompany
{
        /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'company')
    {
        // Check if the user is authenticated under the 'company' guard
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('company.login'); // Redirect to company login page
        }

        return $next($request);
    }

}
