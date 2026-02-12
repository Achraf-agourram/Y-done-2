<?php

namespace App\Http\Controllers;
use App\Services\PayPalService;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(PayPalService $paypal)
    {
        $order = $paypal->createOrder(20);

        return response()->json([
            'id' => $order['id']
        ]);
    }

    public function capture($orderId, PayPalService $paypal)
    {
        $capture = $paypal->captureOrder($orderId);

        if ($capture['status'] === 'COMPLETED') {
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false
        ], 400);
    }
}
