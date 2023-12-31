<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class nonAuthHomeController extends Controller
{
    public function index()
    {

        $tenRandom =  Categoria::inRandomOrder()->limit(10)->get();
        $nonSliderArticles =  Producto::inRandomOrder()->limit(4)->get();
        $sliderArticles = Producto::inRandomOrder()->limit(10)->get();

        return view('home', [
            'categorias' =>  $tenRandom,
            'nonSliderArticles' => $nonSliderArticles,
            'random_articles' => $sliderArticles,
        ]);

    }
}
