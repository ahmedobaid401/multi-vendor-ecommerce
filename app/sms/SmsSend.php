<?php
namespace App\sms;


 
class SmsSend 
{
    

   public function sendMessage($to){
    $basic  = new \Vonage\Client\Credentials\Basic("eeef4d29", "JiaobJR0OxKSPtmp");
    $client = new \Vonage\Client($basic);

    $response = $client->sms()->send(
        new \Vonage\SMS\Message\SMS($to,"ahmed obaid", 'hello my wife')
    );
    
    $message = $response->current();
    
    if ($message->getStatus() == 0) {
        echo "ahmed ,The message was sent successfully\n";
    } else {
        echo "The message failed with status: " . $message->getStatus() . "\n";
    }


  }

  












}