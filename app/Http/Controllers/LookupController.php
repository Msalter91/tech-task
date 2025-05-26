<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Lookup\LookupService;
use App\Values\Lookup\LookupValue;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

/**
 * Class LookupController
 *
 * @package App\Http\Controllers
 */
class LookupController extends Controller
{
    public function lookup(Request $request, LookupService $lookupService, Client $client)
    {

        $validator = Validator::make(
            $request->all(),
            [
            'type' => 'required|in:xbl,minecraft,steam',
            'id' => 'required_if:type,steam',
            'username' => 'string|sometimes'
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors('Steam must use an ID'), 400);
        }

        $requestData = $request->all();
        $cacheKey = $request['type'] . '-' . ($request['username'] ?? $request['id']);

        $cacheHit = Cache::get($cacheKey);

        if ($cacheHit) {
            return $cacheHit;
        }
        $lookupValue = new LookupValue($requestData);
        try {
            $response = $lookupService->handle($lookupValue);
        } catch (\Error $e) {
            return response($e->getMessage(), 400);
        }

        $response = [
          'username' => $response->getUsername(),
          'id' => $response->getId(),
          'avatar' => $response->getAvatar(),
        ];

        Cache::add($cacheKey, $response, 300);

        return $response;
    }
}
