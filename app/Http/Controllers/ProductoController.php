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

        $errors=array();
        

        foreach($data as $item) {
            $cantidad = $item->cantidad;
            $nombreProducto = $item->nombreProducto;
            $cantidad_en_stock = Producto::where('name', $nombreProducto)->get('stock')[0]['stock'];
            
            if ($cantidad_en_stock - $cantidad < 0) {
                $error = "No hay suficiente stock para: " . $nombreProducto . " \nstock disponible: " . $cantidad_en_stock;
                array_push($errors, $error);
            }
        }

        return $errors;
    }

    public function buscar(Request $request) 
    {
        $keyword = $request->all()['buscar'];
        $Productos = Producto::where('name', 'like', '%' . $keyword . '%')->get();
        return view('productos.show_productos', [
            'Productos' => $Productos
        ]);
    }

}
