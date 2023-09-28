<?php

namespace App\Http\Controllers;

use \App\Models\UsuarioCarrito;
use Session;
use Stripe;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        $items = UsuarioCarrito::where('usuario_id', Auth()->user()->id)
            ->where('status', '')
            ->get();

        if (count($items) == 0){
            return redirect('/');
        }


        return view('stripe.index', [
            'items' => $items
        ]);

    }

    public function stripePost(Request $request)
    {
        $items = UsuarioCarrito::where('usuario_id', Auth()->user()->id)
            ->where('status', '')
            ->get();

        $total = 0;
        foreach ($items as $item){
            $total = $total + $item->producto->precio_mx * $item->cantidad; 
        }

        if ($total < 10) {
            // NO PUEDE SER MENOR DE 1O PESOS
            return;
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $result = Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "mxn",
                "source" => $request->stripeToken,
                "description" => "Intento de pago"
        ]);

        if ($result->status == "succeeded") {
            
            foreach ($items as $item){
                $item->status = "PAGADO";
                $item->id_pago = $result->id; 
                $item->save();

                // actualizar stock
                $item->producto->decrement('stock', $item->cantidad);
            }

            return view('stripe.success', [
                'status' => $result->status
            ]);
        }
        else {

            return view('stripe.other', [
                'status' => $result->status
            ]);
        }
    }
}
