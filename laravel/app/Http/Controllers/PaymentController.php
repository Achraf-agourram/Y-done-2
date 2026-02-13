<?php

namespace App\Http\Controllers;
use App\Services\PayPalService;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(PayPalService $paypal)
    {
        $response = $paypal->createOrder(20);

        return response()->json($response);
    }

    public function capture($orderId, PayPalService $paypal)
    {
        $response = $paypal->captureOrder($orderId);

        return response()->json($response);
    }
}