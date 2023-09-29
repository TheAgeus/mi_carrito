<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;

class nonAuthHomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'categorias' => Categoria::all(),
        ]);
    }
}
