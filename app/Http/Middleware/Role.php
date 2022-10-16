<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

use App\Models\AdminUserType;

class Role {

  public function handle($request, Closure $next, String $role) {
      $user = Auth::user();
      $type = AdminUserType::select($role)->where('user_id',$user->id)->first();
      
      if($type->$role==1 && $user->type==1){
        return $next($request);
      }else{
        return redirect('/');
      }
      
   
   
  }
}