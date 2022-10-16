<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class CookiesController extends BaseController
{
    //feature useages
    public function setcookies(Request $request)
    {
        $minutes = 60;
        $response = new Response('Set Cookie');
        $response->withCookie(cookie('cookiemiracleWeb', 'MyValue', $minutes));
        // return $response;

        // dd($response);
        return redirect()->back();
    }

    public function getcookies(Request $request){
        $value = $request->cookie('cookiemiracleWeb');
        return $value;
     }
}
