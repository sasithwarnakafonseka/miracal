<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  // protected $redirectTo = RouteServiceProvider::HOME;
  public function redirectTo()
  {
    $role = Auth::user()->type;
    switch ($role) {
      case '1': //admin
        return '/admin_dashboard';
        break;
      case '2': //user
        return '/my-account';
        break;

      default: //customer 
        return '/';
        break;
    }
  }

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(Request $request)
  {
    // dd($request);
    try {
      $this->middleware('guest')->except('logout');
    } catch (\Throwable $th) {
      dd($th);
      redirect()->route('/');
    }

  }
}