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

    public function item($carritoItemId)
    {
        return redirect('micarrito');
    }

    public function delete($carritoRowId)
    {
        UsuarioCarrito::find($carritoRowId)->delete();
        return redirect()->back();
    }

    public function deleteAll()
    {
        UsuarioCarrito::where('usuario_id', Auth()->user()->id)->delete();
        return redirect()->back();
    }

}
