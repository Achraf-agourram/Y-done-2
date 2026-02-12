<?php

namespace App\Http\Controllers;
use App\Services\PayPalService;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(PayPalService $paypal)
    {
        $order = $paypal->createOrder(10);

        return response()->json($order);
    }

    public function capture($orderId, PayPalService $paypal)
    {
        $capture = $paypal->captureOrder($orderId);

        return response()->json($capture);
    }
}
