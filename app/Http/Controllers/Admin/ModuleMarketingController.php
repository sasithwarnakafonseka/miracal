<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partners;
use App\Models\PartnersOffer;
use App\Models\Banner;
use App\Models\Team;
use App\Models\BannerCategories;
use App\Models\Testimonios;
use App\Models\Meta;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ModuleMarketingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:marketing');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Partners start

    public function Partners()
    {
        $partners = Partners::all();
        return view('moduleMarketing.partners',['partners'=>$partners]);
    }

    Public function addNewPartners(Request $request){

        $newPartners = New Partners();
        $newPartners->name = $request->title;
        $newPartners->url = $request->url;
        $newPartners->status = 1;

        if($image = $request->file('logo')){
            $_image_path = Storage::putFile('Partners',$image , 'public');
            $newPartners->logo= $_image_path;
        }
        $newPartners->save();

        foreach($request->Offering as $offer){
            $PartnersOffer = new PartnersOffer();
            $PartnersOffer->id_partner = $newPartners->id;
            $PartnersOffer->name_offering = $offer;
            $PartnersOffer->save();
        }
        
        toastr()->success('Your Action Success');
        return redirect()->back();

        dd($request->Offering);
    }

    public function destroyPartners(Request $request){
        $partner= Partners::find($request->delete_id)->delete();
        toastr()->success('Your Action Success');
        return redirect()->back();
    }

    // Partners end

    // Testimonios START

    public function Testimonios()
    {
        $testimonios = Testimonios::all();
        return view('moduleMarketing.testimonios',['testimonios'=>$testimonios]);
    }

    public function addNewTestimonios(Request $request){
        $testimonios = new Testimonios();
        $testimonios->name = $request->name;
        $testimonios->title = $request->title;
        $testimonios->testimonio =  $request->testimonio;
        $testimonios->status = 1;
        if($image = $request->file('image')){
            $_image_path = Storage::putFile('Testimonios',$image , 'public');
            $testimonios->img= $_image_path;
        }
        $testimonios->save();
        toastr()->success('Your Action Success');
        return redirect()->back();
    }

    public function destroyTestimonios(Request $request){
        $testimonio= Testimonios::find($request->delete_id)->delete();;
        toastr()->success('Your Action Success');
        return redirect()->back();
    }

    public function editTestimonios(Request $request){
        //dd($request->edit_title);
        $testimonios= Testimonios::find($request->edit_id);
        $testimonios->name = $request->edit_name;
        $testimonios->title = $request->edit_title;
        $testimonios->testimonio =  $request->edit_testimonio;
        $testimonios->status = 1;
        if($image = $request->file('edit_image')){
            $_image_path = Storage::putFile('Testimonios',$image , 'public');
            $testimonios->img= $_image_path;
        }
        $testimonios->update();
        return redirect()->back();
        
    }

    // Testimonios END

    //Banner Start
    
    public function Banners()
    {
        return view('moduleMarketing.banners');
    }

    public function AddCat(Request $request)
    {
        $BannerCategories = new BannerCategories();
        $BannerCategories->name = $request->banner_cat_name;
        $BannerCategories->save();

        toastr()->success('Your Action Success');
        return redirect()->back();

    }

    public function GetListBanners(Request $request){
        $banner = Banner::where('banner_cat_id',$request->Category)->get();
        $meta = Meta::where('location_cat',$request->Category)->get();

        $return = ['banner'=>$banner,'meta'=>$meta];

        if(count($banner)>0 || count($meta)>0){
            return $return;
        }else{
            return 'no-data';
        }
    }


    public function addNewBanner(Request $request){
            $Banner = new Banner();
            $Banner->banner_cat_id = $request->Banner_Category_send;
            $Banner->title = $request->Banner_Title;
            $Banner->title_color = $request->Banner_Title_color;
            $Banner->loaction_type = $request->loction_type;
            $Banner->text = $request->Banner_Text;
            $Banner->text_color = $request->Banner_Text_color;
            // $Banner->alignment = $request->alignment;

            $Banner->button_text = $request->button_text;
            $Banner->button_text_color = $request->button_text_color;
            $Banner->button_color = $request->button_color;
            $Banner->button_url = $request->button_url;
            
            if($image = $request->file('Banner_Image')){
                $_image_path = Storage::putFile('Banners',$image , 'public');
                $Banner->img= $_image_path;
            }
            $Banner->status = 1;
            $Banner->save();
            toastr()->success('Your Action Success');
            return redirect()->back();
    }


    public function deleteBanner(Request $request){
        $Banner = Banner::find($request->id)->delete();
        return $Banner;
    }

    public function editBanner(Request $request){
        $Banner = Banner::find($request->bannerId_edit);
            $Banner->title = $request->Banner_edit_Title;
            $Banner->title_color = $request->Banner_edit_Title_color;
            $Banner->text = $request->Banner_edit_Text;
            $Banner->text_color = $request->Banner_edit_Text_color;
            // $Banner->alignment = $request->alignment;

            $Banner->button_text = $request->Banner_edit_button_text;
            $Banner->button_text_color = $request->Banner_edit_button_text_color;
            $Banner->button_color = $request->Banner_edit_button_color;
            $Banner->button_url = $request->Banner_edit_button_url;
            
            if($image = $request->file('Banner_edit_Image')){
                $_image_path = Storage::putFile('Banners',$image , 'public');
                $Banner->img= $_image_path;
            }
            $Banner->status = 1;
        $Banner->update();
        toastr()->success('Your Action Success');
        return redirect()->back();
    }
    // banner End


    // Team Start

     public function Teams()
    {
        $allTeams = Team::all();
        return view('moduleMarketing.team',['allTeams'=>$allTeams]);
    }


    public function addTeam(Request $request){
        $Team = new Team();
        $Team->name = $request->name;
        $Team->role = $request->role;
        
        if($image = $request->file('img')){
            $_image_path = Storage::putFile('Team_mem',$image , 'public');
            $Team->img= $_image_path;
        }

        $Team->facebook_link = $request->facebook;
        $Team->linkdin_link = $request->linkdin;
        $Team->Instagram_link = $request->instagram;

        $Team->status = 1;
        $Team->save();
        toastr()->success('Your Action Success');
        return redirect()->back();
    }

    public function editTeams(Request $request)
    {
        $Team = Team::find($request->id);
        $Team->name = $request->name;
        $Team->role = $request->role;
        
        if($image = $request->file('img')){
            $_image_path = Storage::putFile('Team_mem',$image , 'public');
            $Team->img= $_image_path;
        }

        $Team->facebook_link = $request->facebook;
        $Team->linkdin_link = $request->linkdin;
        $Team->Instagram_link = $request->instagram;

        $Team->status = 1;
        $Team->save();
        toastr()->success('Your Action Success');
        return redirect()->back();
    }

    public function destroy_team_member(Request $request)
    {
        $Team = Team::find($request->delete_id)->delete();
        toastr()->success('Your Action Success');
        return redirect()->back();
    }
    // team end

    //start meta

    public function addMeta(Request $request){
       $meta = new Meta();
       $meta->title = $request->page_title_meta;
       $meta->location_cat = $request->page_id_meta;
       $meta->discription = $request->page_discription_meta;
       $meta->tags = $request->page_tag_meta;
       $meta->save();
       toastr()->success('Your Action Success');
        return redirect()->back();
    }

    public function editMeta(Request $request){
        $meta = Meta::find($request->id);
        $meta->title = $request->page_title_meta;
        $meta->location_cat = $request->page_id_meta;
        $meta->discription = $request->page_discription_meta;
        $meta->tags = $request->page_tag_meta;
        $meta->update();
        toastr()->success('Your Action Success');
         return redirect()->back();
     }

     public function deleteMeta(Request $request){
        Meta::find($request->id)->delete();
        toastr()->success('Your Action Success');
        return redirect()->back();
     }
 
 
    //end meta
}
