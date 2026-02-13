<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PayPalService
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.paypal.base_url');
    }

    public function getAccessToken()
    {
        $response = Http::withBasicAuth(
                config('services.paypal.client_id'),
                config('services.paypal.secret')
            )
            ->asForm()
            ->post($this->baseUrl . '/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);

        return $response->json()['access_token'];
    }

    public function createOrder($amount = 10.00)
    {
        $accessToken = $this->getAccessToken();

        $response = Http::withToken($accessToken)
            ->post($this->baseUrl . '/v2/checkout/orders', [
                "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => number_format($amount, 2, '.', '')
                        ]
                    ]
                ]
            ]);

        return $response->json();
    }

    public function captureOrder($orderId)
    {
        $accessToken = $this->getAccessToken();

        $url = $this->baseUrl . "/v2/checkout/orders/{$orderId}/capture";

        $response = Http::withToken($accessToken)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])
            ->send('POST', $url);

        return $response->json();
    }
}