<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;

class WebNotificationController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:mobile_notifications');
    }

   
  
    public function storeToken(Request $request)
    {
        auth()->user()->update(['device_key'=>$request->token]);
        return response()->json(['Token successfully stored.']);
    }
  
    public function sendWebNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();
          
        $serverKey = 'AAAAcgrng3c:APA91bE2A_OaiNLJziIBs1cfIXyx1k1zWTYJw3QIPJmP0lcBPG44sf_uZLJtSC1E9nMhbM19F4daz59egpTN2eAp_ea4z1-iRXv2m2LxTqd2Svs-qJPuv9PsqfpZR7oGjnOPD3KMFUE7';
  
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];

        // dd($data);
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        $status = "Success";
        if ($result === FALSE) {
            $status = url_error($ch);;
            
        }        

        // Close connection
        curl_close($ch);

  

        // FCM response
        $resultData = [
            "status" =>$status,
            "type" =>"0",
            "user" => null,
            "title" => $request->title,
            "body" => $request->body,
        ];
        $this->UpdateDB($resultData);  
        toastr()->success('Your Action Success'); 
        return redirect()->back();
    }

    public function sendWebNotificationUser(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
    //    dd($request->userId);
        $FcmToken = User::find($request->userId)->whereNotNull('device_key')->pluck('device_key')->first();
        $serverKey = 'AAAAcgrng3c:APA91bE2A_OaiNLJziIBs1cfIXyx1k1zWTYJw3QIPJmP0lcBPG44sf_uZLJtSC1E9nMhbM19F4daz59egpTN2eAp_ea4z1-iRXv2m2LxTqd2Svs-qJPuv9PsqfpZR7oGjnOPD3KMFUE7';
       
        $data = [
            "registration_ids" => [
                0 => $FcmToken
            ],
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];

        // dd($data);
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        // Execute post
        $result = curl_exec($ch);
        $status = "Success";
        if ($result === FALSE) {
            $status = url_error($ch);;
            
        }        

        // Close connection
        curl_close($ch);

        // FCM response
        $resultData = [
            "status" =>$status,
            "type" =>"1",
            "user" => $request->userId,
            "title" => $request->title,
            "body" => $request->body,
        ];
        $this->UpdateDB($resultData);
        toastr()->success('Your Action Success');
        return redirect()->back();
    }


    public function UpdateDB($result){
       $Notification = new Notification(); 
       $Notification->title = $result['title'];
       $Notification->body = $result['body'];
       $Notification->type = $result['type'];
       $Notification->status = $result['status'];
       $Notification->userId = $result['user'];

       $Notification->save();

        
    }
}