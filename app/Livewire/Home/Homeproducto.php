<?php

namespace App\Livewire\Home;

use Livewire\Component;
use \App\Models\Producto;

class Homeproducto extends Component
{

    public $producto;
    public $cantidad;

    public function mount($producto)
    {
        $this->producto = $producto;
    }

    public function render()
    {
        return view('livewire.home.homeproducto');
    }


    public function addToCart()
    {
        $this->dispatch('myEvento', producto: $this->producto, cantidad: $this->cantidad);
    }
}
