<?php

namespace Tests\Feature;

use App\Services\Lookup\LookupService;
use Tests\TestCase;
use Mockery as m;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_correctly_rejects_steam_with_username()
    {
        $response = $this->get('/lookup?type=steam&username=test');

        $response->assertStatus(400);
        $this->assertEquals('The id field is required when type is steam.' ,$response->json()['id'][0]);
    }

    public function test_it_correctly_rejects_incorrect_types()
    {

        $mockService = m::mock(LookupService::class);
        $response = $this->get('/lookup?type=cheese&username=test');

        $response->assertStatus(400);
        $this->assertEquals('The selected type is invalid.' ,$response->json()['type'][0]);
        $mockService->shouldReceive('handle')->never();
    }

    public function test_it_correctly_calls_the_handle_function()
    {
      $mockService = m::mock(LookupService::class);
      app()->instance(LookupService::class, $mockService);
      $mockService->shouldReceive('handle')->once();

      $this->get('/lookup?type=minecraft&username=test');
    }

}
