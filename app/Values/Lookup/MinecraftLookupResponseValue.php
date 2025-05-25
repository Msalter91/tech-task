<?php declare(strict_types=1);

namespace App\Values\Lookup;

class MinecraftLookupResponseValue
{
  public string $username;
  public string $id;
  public string $avatar; 

  public function __construct($response)
  {
    $this->username = $response->name;
    $this->id = $response->id;
    $this->avatar = "https://crafatar.com/avatars{$this->id}";
  }
}