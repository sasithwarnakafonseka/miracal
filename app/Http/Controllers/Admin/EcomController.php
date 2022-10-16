<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Vrmodule;
use App\Models\User;
use App\Models\Sale;
use App\Models\SaleBill;
use App\Models\SaleProduct;

class EcomController extends Controller
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

    //Index Page

    public function index()
    {
        // $ModuleList = VrModule::all();
        $customers = User::get();
        $orders = Sale::with('saleproduct','salebill')->get();
        return view('Ecom.index',['orders'=>$orders,'customers'=>$customers]);
    }

    // public function 

    public function delete(Request $Request){
        Sale::find($Request->pr_delete_id)->delete();
        toastr()->success('Your Action Success');
        return redirect()->back();
    }

    public function change_status(Request $Request)
    {
        $sale = Sale::find($Request->id);
        $sale->status = $Request->status;
        $sale->save();

        if($Request->status==0){
            $status = "Processing";
        }elseif($Request->status==1){
            $status = "Pending";
        }elseif($Request->status==2){
            $status = "Completed";
        }elseif($Request->status==3){
            $status = "Rejected";
        }

        if($sale){
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("hello@miracle.com", "hello@miracle");
            $email->setSubject($status.":: Oder Status Change");
            $email->addTo($sale->bill_email, $sale->bill_username);
            $email->addContent(
                "text/html", "<h3>".$sale->id." Oder Status Change</h3><br><br><p>Your Oder Status Change to ".$status." </p>"
            );
            $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
            try {
                $response = $sendgrid->send($email);
                
            } catch (Exception $e) {
                echo 'Caught exception: '. $e->getMessage() ."\n";
            }
        }
    }
}