<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Values\Lookup\LookupValue;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_correctly_sets_xbl_values()
    {
      $requestData = [
        'type' => 'xbl',
        'id' => 'uheqrpg789wher'
      ];

      $value = new LookupValue($requestData);

      $this->assertEquals('xbl', $value->type);
      $this->assertEquals('uheqrpg789wher', $value->id);
      $this->assertEquals('https://ident.tebex.io/usernameservices/3/username/uheqrpg789wher', $value->apiDetails);
      $this->assertNull($value->username);
    }

    public function test_it_correctly_sets_minecraft_values()
    {
      $requestData = [
        'type' => 'minecraft',
        'username' => 'cheeselord'
      ];

      $value = new LookupValue($requestData);

      $this->assertEquals('minecraft', $value->type);
      $this->assertEquals('cheeselord', $value->username);
      $this->assertEquals('https://api.mojang.com/users/profiles/minecraft/cheeselord', $value->apiDetails);
      $this->assertNull($value->id);
    }
}
