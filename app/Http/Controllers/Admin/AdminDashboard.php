<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use DB;
class AdminDashboard extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales = $months = Sale::select(
            DB::raw('sum(total_price) as `sums`'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
            DB::raw('max(created_at) as createdAt')
     )
           ->where("created_at", ">", \Carbon\Carbon::now()->subMonths(6))
           ->orderBy('createdAt', 'desc')
           ->groupBy('months')
           ->get();

        return view('dashboard.index',['sales'=>$sales]);
    }
}