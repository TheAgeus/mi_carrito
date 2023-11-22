<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use GuzzleHttp\Client;

class PaymentController extends Controller
{

    public function payWithPayPal() {
        return view('paypal.show');
    }

    public function generateAccessToken() {
        try {
            $clientId = env('PAYPAL_CLIENT_ID');
            $clientSecret = env('PAYPAL_CLIENT_SECRET');

            $auth = base64_encode("$clientId:$clientSecret");

            $client = new Client();

            $response = $client->post('https://api.sandbox.paypal.com/v1/oauth2/token', [
                'form_params' => [
                    'grant_type' => 'client_credentials',
                ],
                'headers' => [
                    'Authorization' => 'Basic ' . $auth,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return $data['access_token'];
        } catch (\Exception $e) {
            // Handle the exception
            \Log::error("Failed to generate Access Token: " . $e->getMessage());
        }
    }



    public function createOrder($order)
    {

        dd($order);

        $accessToken = $this->generateAccessToken();
        $url = 'https://api-m.sandbox.paypal.com/v2/checkout/orders';

        $payload = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'MXN',
                        'value' => '100.00', // You may need to calculate this based on your cart information
                    ],
                ],
            ]
        ];

        $client = new Client();


        $response = $client->post($url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
            ],
            'json' => $payload,
        ]);


        return $this->handleResponse($response);

    }

    public function handleResponse($response)
    {
        // Implement your response handling logic here
        // You may want to check the response status code, handle errors, and return the relevant data
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        return json_decode($body, true); // Assuming the response is in JSON format
    }

 

    public function captureOrder($orderId)
    {
        return $orderId;
        try {
            $accessToken = generateAccessToken();
            $url = 'https://api-m.sandbox.paypal.com/v2/checkout/orders/' . $orderId . '/capture';
            
            // Implement logic to capture the order with $orderId

            // For example:
            // $capturedOrder = YourOrderModel::find($orderId);
            // $capturedOrder->capture(); // Assuming capture() is a method in your model
            $client = new Client();

            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $accessToken,
                ],
            ]);

            return $this->handleResponse($response);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to capture order.'], 500);
        }
    }
}
