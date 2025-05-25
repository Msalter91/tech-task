<?php declare(strict_types=1);

namespace App\Values\Factory;

use App\Values\Lookup\MinecraftLookupResponseValue;
use App\Values\Lookup\SteamLookupResponseValue;
use App\Values\Lookup\XblLookupResponseValue;

class LookupResponseFactory
{

  public static function build($type, $responseData)
  {
    return match($type) {
      'minecraft' => new MinecraftLookupResponseValue($responseData),
      'steam' => new SteamLookupResponseValue($responseData),
      'xbl' => new XblLookupResponseValue($responseData),
    };
  }
  
}