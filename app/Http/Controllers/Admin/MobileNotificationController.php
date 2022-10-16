<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;

class MobileNotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:mobile_notifications');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $single_user = Notification::where('notification.type',1)->join('users', 'notification.userId', '=', 'users.id')->get();
        $all_user = Notification::where('type',0)->get();
        return view('mobileNotification.index',['single_user'=>$single_user,'all_user'=>$all_user]);
    }
}