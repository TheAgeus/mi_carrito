<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{

    public function index()
    {
        return view('stripe.payment', [
            'items' => []
        ]);
    }

    public function checkout()
    {
        $stripe = new \Stripe\StripeClient( env('STRIPE_KEY') );
    }
}
