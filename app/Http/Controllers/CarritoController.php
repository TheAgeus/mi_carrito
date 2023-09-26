<?php

namespace App\Http\Controllers;
use \App\Models\UsuarioCarrito;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = UsuarioCarrito::where('usuario_id', Auth()->user()->id)->get();
        
        
        return view('carrito.index', [
            'carrito' => $carrito
        ]);
    }
}
