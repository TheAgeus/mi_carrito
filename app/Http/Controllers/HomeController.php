<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function userHome()
    {
        return view('home', ["msg"=>"Im user"]);
    }

    public function adminHome()
    {
        return view('home', ["msg"=>"Im admin"]);
    }

    public function inventariosHome()
    {
        return view('home', ["msg"=>"Im inverory man"]);
    }
}
