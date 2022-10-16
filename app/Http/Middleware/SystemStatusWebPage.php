<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SystemStatusWebPage
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
        $system_status = DB::table('system_details')->select('status')->first();
      if($system_status->status==0){
          return view('website.coming_soon');
      }
    }
}
