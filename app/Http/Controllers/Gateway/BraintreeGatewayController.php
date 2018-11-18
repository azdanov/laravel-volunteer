<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Braintree\Gateway;
use Illuminate\Http\JsonResponse;

class BraintreeGatewayController extends Controller
{
    /** @var Gateway */
    private $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function token(): JsonResponse
    {
        return response()->json([
            'token' => $this->gateway->clientToken()->generate(),
        ]);
    }
}
