<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;

class nonAuthHomeController extends Controller
{
    public function index()
    {

        $tenRandom =  Categoria::inRandomOrder()->limit(10)->get();

        return view('home', [
            'categorias' =>  $tenRandom,
        ]);

    }
}
