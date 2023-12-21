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

use App\Models\Payment as Pago;
use App\Models\Item;

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

    public function save_success_sale(Request $request) {
       
        $requestData = $request->all();

        try{
            $pago = new Pago();
            $pago->id_movimiento = $requestData['id_movimiento'];
            $pago->id_usuario = $requestData['id_usuario'];
            $pago->monto = $requestData['monto'];
            $pago->address = $requestData['address'];
            $pago->estado = "pagado";
            $pago->save();

            foreach($requestData['items'] as $item) {
                $item_db = new Item();
                $item_db->pago_id = $pago->id;
                $item_db->productoName = $item['nombreProducto'];
                $item_db->cantidad = $item['cantidad'];
                $item_db->precio = $item['precioProducto'];
                $item_db->save();

                // bajar stock
                $producto = $item_db->producto;
                $stock = $producto->stock;
                $new_stock = $stock - $item_db->cantidad;
                $producto->update(['stock' => $new_stock]);
            }
         }
         catch(\Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
                'request' => $requestData,
                'items' => $requestData['items']
            ]);
         }
         return response()->json([
            'success' => 'pago registrado con exito',
        ]);
    }

    public function mis_compras()
    {
        // Get all data to be displayed (Pagos con sus respectivos Items)
        $user_id = Auth()->user()->id;
        $pagos = Pago::where('id_usuario', $user_id)->get();
        
        return view('pagos.mis_compras', [
            'pagos' => $pagos
        ]);
    }

    public function mi_compra($id)
    {
        // auth user id
        $user_id = Auth()->user()->id;

        $compra = Pago::find($id);
        
        if($compra != null) { // Si existe esa compra

            $compra_user_id = $compra->id_usuario;

            if(Auth()->user()->role == "user") { // Si el usuario logueado usuario normal, o sea, no es admin o inventarios

                if($user_id != $compra_user_id) { // Si la compra no es de ese usuario
                     
                    return redirect()->back()->with('error', 'Esa compra no es tuya');  
                }
            }
        }
        else {
            return redirect()->back()->with('error', 'Esa existe esa compra'); 
        }
            
        $items = $compra->items;

        return view('pagos.mi_compra', [ 
            'compra' => $compra,
            'items' => $items,
        ]);
    }

    public function ventas() {
        return view('pagos.ventas', [
            'ventas' => Pago::all()
        ]);
    }

    public function ventas_update_estado(Request $request) {
        $data = $request->all();
        $id = $data['pago_id'];
        $estado = $data['estado'];
        Pago::find($id)->update(['estado' => $estado]);
        return redirect()->back();
    }

}
