<?php 

namespace App\Services\Lookup;

use App\Values\Lookup\LookupValue;
use App\Values\Factory\LookupResponseFactory;
use Error;
use GuzzleHttp\Client;

class LookupService 

{
  public function handle(LookupValue $lookupValue)
  {
    $client = new Client();
    try{
      $response = $client->get($lookupValue->apiDetails);
      $responseJson = json_decode($response->getBody()->getContents());
    } catch (Error $e) {
      throw new Error("Unable to reach lookup sever for {$lookupValue->type}");
    }
    $responseValue = LookupResponseFactory::build($lookupValue->type, $responseJson);
    return $responseValue;
  }

}