<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;

class smsController extends Controller
{
    public function sendSMS()
    {
        $basic  = new \Vonage\Client\Credentials\Basic ("83a040a5", "duEjDMbD2nmYPFWA");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("6282124389882", BRAND_NAME, 'A text message sent using the Nexmo SMS API')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
