<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebPageController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 
     */

    public function __construct()
    {
       // $this->middleware('auth');
    }
 
     public function index()
    {
        return view('website.welcome');
    }
}
