<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
class ProfileController extends Controller
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
        return view('profile.index');
    }

    public function settings()
    {
        $user = Auth::user();
        return view('profile.index',['user'=>$user]);
    }
   
    public function UserEdit(Request $request)
    {

       
            $User =  User::find(Auth::user()->id);
            $User->name = $request->uname;
            if(!(User::where('email',$request->email)->first())){
                $User->email = $request->email;
            }else{
                toastr()->success('Email Already Used');
            }
            $User->phone = $request->Contact_Number;
            $User->save();
    
            toastr()->success('Your Action Success');
            return redirect()->back();
    
        
    }
    public function EditPass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_pass' => 'required|min:5|max:20',
            'conf_new_pass' => 'required|min:3|max:20|same:new_pass'
        ]);

        $validat_val = $validator->validate();
      
            $User =  User::find(Auth::user()->id);
            $User->password = Hash::make($validat_val['conf_new_pass']);
            $User->save();

        toastr()->success('Your Action Success');
 
            Auth::logout();
        
            return redirect('/');
      

        
        
    }

}
