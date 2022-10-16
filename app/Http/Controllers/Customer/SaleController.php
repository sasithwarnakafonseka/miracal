<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleBill;
use App\Models\SaleProduct;
use Mail;
use Illuminate\Support\Facades\File; 
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SaleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    //create order
    public function CreateSale(Request $Request)
    {
        
        $orderList = session()->get('cart');

        $NewOrder = new Sale();

        if(Auth::user()){
            $NewOrder->customer_id = Auth::user()->id;
        }else{
            $NewOrder->customer_id = 0;
        }
        
        $NewOrder->total_price =$Request->total_price;
        
        $NewOrder->status = 1;
        $NewOrder->save();

        $NewBill = new SaleBill();
        $NewBill->sale_id = $NewOrder->id;

        if(Auth::user()){
            $NewBill->bill_user = Auth::user()->id;
        }else{
            $NewBill->bill_user = 0;
        }

        $NewBill->bill_fname = $Request->firstName;
        $NewBill->bill_lname = $Request->lastName;
        $NewBill->bill_username = $Request->username;
        $NewBill->bill_email = $Request->email;
        $NewBill->bill_address = $Request->address;
        $NewBill->bill_address_2 = $Request->address2;
        $NewBill->bill_country = $Request->country;
        $NewBill->bill_state = $Request->state;
        $NewBill->bill_zip = $Request->zip;
        $NewBill->save();

        foreach($orderList as $order){
            $NewSaleProduct = new SaleProduct();
            $NewSaleProduct->sale_id = $NewOrder->id;
            $NewSaleProduct->product_id = $order['id'];
            $NewSaleProduct->product_qty = $order['quantity'];
            $NewSaleProduct->save();
        }

         $bill = array($NewOrder,$NewBill,$orderList);

        session()->forget('cart');

        // if($NewBill){
        //     $pdf = PDF::loadView('emails.bill');
        //     $fileName =  $NewOrder->id . '.' . 'pdf' ;
        //     $pdf->save($fileName);
            
            
        //     $email = new \SendGrid\Mail\Mail();
        //     $email->setFrom("hello@miracle.com", "hello@miracle");
        //     $email->setSubject("Order Placed Successfully");
        //     $email->addTo($Request->email, $Request->username);
            
        //     $file_encoded = base64_encode(file_get_contents($fileName));
        //     $email->addAttachment(
        //         $file_encoded,
        //         "application/pdf",
        //         "invoice.pdf",
        //         "attachment"
        //     );

        //     $email->addContent(
        //         "text/html", "<h3>Order Placed Successfully</h3><br><br><p>Oder ID:".$NewOrder->id."</p>"
        //     );
           

        //     $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));

        //     try {
        //         $response = $sendgrid->send($email);
        //     } catch (Exception $e) {
        //         echo 'Caught exception: '. $e->getMessage() ."\n";
        //     }

        //     File::delete($fileName);
        // }
        if(Auth::user()){
            return redirect()->route('my-account')->with('success', 'Order place successfully!');
        }else{
            return redirect()->route('/')->with('success', 'Order place successfully, Please check your mail for order details!');;
        }
        
        
        // Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
        //     $m->from('hello@app.com', 'Online Order Created Successfully !');
        //     $m->to($user->email, $user->name)->subject('Online Order Created Successfully!');
        // });

        
        
    }

   

    //all orders Details
    public function UserOrders()
    {
        
    }

    //selected order Details
    public function UserOrder()
    {
        
    }

    //payemet for order
    public function PaymentforOrder()
    {
        
    }

    //  //payemet for order
    //  public function ()
    //  {
         
    //  }
}
