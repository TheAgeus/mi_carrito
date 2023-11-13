<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('categoria.index');
    }

    public function showCategoria($categoria_id)
    {
        $productos_categoria = Producto::where('categoria_id', $categoria_id)->get();
        $categoria_name = Categoria::find($categoria_id)->name;

        return view('categoria.showCategoria', [
            'productos_categoria' => $productos_categoria,
            'categoria_name' => $categoria_name
        ]);
    }

    public function showCategorias() 
    {
        $categorias = Categoria::all();
        return view('categoria.showCategorias', [
            'categorias' => $categorias
        ]);
    }
}
