<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PayPalService
{
    public function getAccessToken()
    {
        $response = Http::withBasicAuth(
            config('services.paypal.client_id'),
            config('services.paypal.secret')
        )->asForm()->post(
            config('services.paypal.base_url') . '/v1/oauth2/token',
            ['grant_type' => 'client_credentials']
        );

        return $response->json()['access_token'];
    }

    public function createOrder($amount)
    {
        $accessToken = $this->getAccessToken();

        $response = Http::withToken($accessToken)
            ->post(config('services.paypal.base_url') . '/v2/checkout/orders', [
                "intent" => "CAPTURE",
                "purchase_units" => [[
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($amount, 2, '.', '')
                    ]
                ]]
            ]);

        return $response->json();
    }

    public function captureOrder($orderId)
    {
        $accessToken = $this->getAccessToken();

        $response = Http::withToken($accessToken)
            ->post(config('services.paypal.base_url') . "/v2/checkout/orders/{$orderId}/capture");

        return $response->json();
    }
}