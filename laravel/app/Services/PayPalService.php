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

        $url = config('services.paypal.base_url') . '/v2/checkout/orders';

        $body = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($amount, 2, '.', '')
                    ]
                ]
            ]
        ];

        $response = Http::withToken($accessToken)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])
            ->send('POST', $url, [
                'body' => json_encode($body)
            ]);
        
        return $response->json();
    }

    public function captureOrder($orderId)
    {
        $accessToken = $this->getAccessToken();

        $response = Http::withToken($accessToken)
            ->post(
                config('services.paypal.base_url') . "/v2/checkout/orders/{$orderId}/capture"
            );

        return $response->json();
    }
}