<?php

declare(strict_types=1);

namespace App\Services\Lookup;

use App\Values\Lookup\LookupValue;
use App\Values\Factory\LookupResponseFactory;
use Error;
use Exception;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class LookupService
{
    public function __construct(public Client $client)
    {
    }

    public function handle(LookupValue $lookupValue)
    {
        try {
            $response = $this->client->get($lookupValue->apiDetails);
            $responseJson = json_decode($response->getBody()->getContents());
        } catch (Exception $e) {
            Log::critical("Unable to reach {$lookupValue->apiDetails}: {$e->getMessage()})");
            throw new Error("Unable to reach lookup sever for {$lookupValue->type}", 400);
        }
        $responseValue = LookupResponseFactory::build($lookupValue->type, $responseJson);
        return $responseValue;
    }
}
