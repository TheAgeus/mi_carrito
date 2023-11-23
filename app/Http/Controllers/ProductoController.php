<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Comentario;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('productos.index');
    }

    public function create()
    {
        return view('productos.create');
    }

    public function showProducto($id)
    {
        $producto = Producto::find($id);
        $comentarios = Comentario::where('producto_id', $id)->orderBy('created_at','desc')->get();
        return view('productos.showProducto', [
            'producto' => $producto,
            'comentarios' => $comentarios,
        ]);
    }

    public function validateStock(Request $request) {
        $data = json_decode($request->getContent());
        return $data;
    }
}
