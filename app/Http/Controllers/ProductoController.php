<?php

namespace App\Http\Controllers;

use App\Models\Producto;

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
        return view('productos.showProducto', [
            'producto' => Producto::find($id)
        ]);
    }
}
