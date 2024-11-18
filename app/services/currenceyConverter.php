<?php
namespace App\services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class currencyConverter {


    protected $baseUrl="https://free.currconv.com/api/v7";
    protected $apiKey;
    
    public function __construct($apiKey){
      $this->apiKey=$apiKey;
    }
    public  function convert(string $from ,string  $to  ){
         
           $q=$from."_".$to;
           $response= Http::baseUrl($this->baseUrl)
            ->get("/convert",[
             "q"=>$q,
             "compact"=>"y",
             "apiKey"=>$this->apiKey,

            ]);
           $result=$response->json();
            $rate=$result[$q];
           
        return $rate;
    }

}

?>