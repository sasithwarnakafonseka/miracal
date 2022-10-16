<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\AdminUserType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class UserManagemetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user_managemet');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //  index file users list view 
    public function index()
    {
        $user_list = DB::table('users')->join('admin_user_type','admin_user_type.user_id','=','users.id')->where('users.type',1)->get();
        return view('userManagemet.index',['user_list'=>$user_list]);
    }

    // add new user from admin user managemet module
    public function addNewUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uname' => 'required|min:5|max:25',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20',
            'password_confirm' => 'required|min:3|max:20|same:password'
        ]);
        $validat_val = $validator->validate();
        $user_name=$validat_val['uname'];
        $user_email=$validat_val['email'];
        $user_password=Hash::make($validat_val['password_confirm']);
        
        $User = new User();
        $User->name = $user_name;
        $User->email = $user_email;
        $User->password = $user_password;
        if($image = $request->file('uimage')){
            $user_image_path = Storage::putFile('userAdminImage',$image , 'public');
            $User->img = $user_image_path;
        }
      
        $User->type = 1;
        //type = Admin
        $User->save();
        $AdminUserType = New AdminUserType();
        $AdminUserType->user_id = $User->id;
        if($request->Mobile_Notifications_Check){
            $AdminUserType->mobile_notifications = 1;
        }
        if($request->Posts_Check){
            $AdminUserType->posts = 1;
        }

        if($request->Marketing_Check){
            $AdminUserType->marketing = 1;
        }

        if($request->Products_Check){
            $AdminUserType->products = 1;
        }

        if($request->User_Manemet_Check){
            $AdminUserType->user_managemet = 1;
        }
        
        if($request->Ecommerce_Check){
            $AdminUserType->ecommerce = 1;
        }

        if($request->Report_Check){
            $AdminUserType->report = 1;
        }

        $AdminUserType->save();
        toastr()->success('Your Action Success');
       return redirect()->back();
        // $User = new User();
        // $User->password = Hash::make($user_password);
        // print($request->validate) ;
    }

    //delete created user from admin
    public function destroy_user(Request $request){
        User::find($request->delete_id)->delete();
        AdminUserType::where('user_id',$request->delete_id)->delete();
        toastr()->success('Your Action Success');
        return redirect()->back();
    }


    //edit created user from admin
    public function editUser(Request $request){
        $User = User::find($request->edit_id);
        if($user_name=$request->edit_uname){
            $User->name = $user_name;
        }
        if($user_email=$request->edit_email){
            $User->email = $user_email;
        }
        if($request->edit_password){
            $user_password_con=Hash::make($request->edit_password_confirm);
            $User->password = $user_password_con;
        }
        
        if($image = $request->file('uimage')){
            $user_image_path = Storage::putFile('userAdminImage',$image , 'public');
            $User->img = $user_image_path;
        }
      
        
        $User->update();
        AdminUserType::where('user_id',$request->edit_id)->delete();
        $AdminUserType = New AdminUserType();
        $AdminUserType->user_id = $User->id;
        if($request->edit_Mobile_Notifications_Check){
            $AdminUserType->mobile_notifications = 1;
        }
        if($request->edit_Posts_Check){
            $AdminUserType->posts = 1;
        }

        if($request->edit_Marketing_Check){
            $AdminUserType->marketing = 1;
        }

        if($request->edit_Products_Check){
            $AdminUserType->products = 1;
        }

        if($request->edit_User_Manemet_Check){
            $AdminUserType->user_managemet = 1;
        }
        
        if($request->edit_Ecommerce_Check){
            $AdminUserType->ecommerce = 1;
        }

        if($request->edit_Report_Check){
            $AdminUserType->report = 1;
        }

        $AdminUserType->save();
        toastr()->success('Your Action Success');
       return redirect()->back();
    }
}
