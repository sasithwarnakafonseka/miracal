<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\EventRegister;


class ModulePostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:posts');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $News_Events = Post::where('type', 2)->get();
        $Blog = Post::where('type', 1)->get();
        $EventRegister = EventRegister::all();
        return view('modulePosts.index', ['News_Events' => $News_Events, 'Blog' => $Blog,'EventRegister'=>$EventRegister]);
    }

    //add new post
    public function addNewPost(Request $request)
    {
        $Post = new Post();
        $Post->title = $request->title;
        $Post->short_des = $request->short_d;

        if($date=$request->date){
            $Post->date =$date;
        }

        if($time=$request->Time){
            $Post->time =$time;
        }


        if($date=$request->date_end){
            $Post->date_end =$date;
        }

        if($time=$request->Time_end){
            $Post->time_end =$time;
        }


        $Post->type = $request->type_;
        if ($image = $request->file('image')) {
            $image_path = Storage::putFile('Post', $image, 'public');
            $Post->img = $image_path;
        }
        $Post->desc = $request->description;
        $Post->created_user = auth()->user()->id;
        $Post->updated_user = auth()->user()->id;
        $Post->save();
        toastr()->success('Your Action Success');
        return redirect()->back();
    }

    //edit post
    public function editPost(Request $request)
    {
        
        $Post = Post::find($request->id_edit);
        $Post->title = $request->title_edit;
        $Post->short_des = $request->short_d_edit;
        if ($image = $request->file('image_edit')) {
            $image_path = Storage::putFile('Post', $image, 'public');
            $Post->img = $image_path;
        }

        if($date=$request->date_edit){
            $Post->date =$date;
        }

        if($time=$request->Time_edit){
            $Post->time =$time;
        }

        $Post->desc = $request->description_edit;
        $Post->updated_user = auth()->user()->id;
        $Post->update();
        toastr()->success('Your Action Success');
        return redirect()->back();
    }

    //delete post
    public function destroy_post(Request $request){
        Post::find($request->delete_id)->delete();
        toastr()->success('Your Action Success');
        return redirect()->back();
    }
}
