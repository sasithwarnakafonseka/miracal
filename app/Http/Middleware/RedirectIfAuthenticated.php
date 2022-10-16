<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
          $role = Auth::user()->type; 
      
          switch ($role) {
            case '1'://admin
              return redirect('/admin_dashboard');
              break;
            case '2'://user
              return '/seller_dashboard';
              break; 
        
            default://customer 
              return redirect('/');
            break;
          }
        }
        return $next($request);
      }
}
