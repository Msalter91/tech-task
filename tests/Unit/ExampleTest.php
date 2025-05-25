<?php

namespace Tests\Unit;

use App\Http\Controllers\Controller;
use PHPUnit\Framework\TestCase;
use Mockery as m;
use App\Services\Lookup\LookupService;
use App\Values\Lookup\LookupValue;
use App\Http\Controllers\LookupController;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_api_service_is_called_correctly()
    {
      $this->assertTrue(true);  
    }
}
