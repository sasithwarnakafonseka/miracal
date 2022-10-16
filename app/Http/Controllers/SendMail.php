<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class SendMail extends BaseController
{
    public function Send(){
        
    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom("info@miracle.com", "Example User");
    $email->setSubject("Sending with SendGrid is Fun");
    $email->addTo("sasithwarnakafonseka@gmail.com", "Example User");
    $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    $email->addContent(
        "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
    );
    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
    }

}
