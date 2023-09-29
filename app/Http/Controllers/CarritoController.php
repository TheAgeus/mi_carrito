<?php

namespace App\Http\Controllers;
use \App\Models\UsuarioCarrito;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = UsuarioCarrito::where('usuario_id', Auth()->user()->id)
            ->where('status', '')
            ->get();
        
        
        return view('carrito.index', [
            'carrito' => $carrito
        ]);
    }

    public function AllCompras()
    {
        $Items = UsuarioCarrito::where('status', 'PAGADO')->get()->groupBy('id_pago');

        return view('compras.all', ['items' => $Items]);
    }


    public function MisCompras()
    {
        $Items = UsuarioCarrito::where('status', 'PAGADO')->where('usuario_id', Auth()->user()->id)->get()->groupBy('id_pago');

        return view('compras.miscompras', ['items' => $Items]);
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
        UsuarioCarrito::where('usuario_id', Auth()->user()->id)
            ->where('status', '')
            ->delete();
        return redirect()->back();
    }

}
