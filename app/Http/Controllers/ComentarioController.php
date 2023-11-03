<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Comentario;

class ComentarioController extends Controller
{
    public function store(Request $request) 
    {
        $usuario_id = Auth()->user()->id;
        $comentario = new Comentario();
        $comentario->comentario = $request->comentario;
        $comentario->calificacion = $request->calificacion;
        $comentario->usuario_id = $usuario_id;
        $comentario->producto_id = $request->producto_id;
        $comentario->save();

        return redirect()->route("showProducto",$request->producto_id )->with("NuevoComentario", "Comentario agregado con éxito.");
    }
}
