<?php declare(strict_types=1);

namespace App\Values\Lookup;

class SteamLookupResponseValue
{
  public string $username;
  public string $id;
  public string $avatar; 

  public function __construct($response)
  {
    $this->username = $response->username;
    $this->id = $response->id;
    $this->avatar = $response->meta->avatar;
  }
}