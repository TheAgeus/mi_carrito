<?php

namespace App\Livewire\Home;

use Livewire\Component;
use \App\Models\Producto;

class Homeproductos extends Component
{
    public function render()
    {
        return view('livewire.home.homeproductos', ['productos' => Producto::all()]);
    }
}
