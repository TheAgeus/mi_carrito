<?php

namespace App\Livewire\Home;

use Livewire\Component;
use \App\Models\Producto;
use \App\Models\UsuarioCarrito;

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


    public function addToCart($user_id)
    {

        UsuarioCarrito::create([
            'usuario_id' => $user_id,
            'producto_id' => $this->producto->id,
            'cantidad' => $this->cantidad
        ]);

        $this->dispatch('updateCart', user_id: $user_id);
        //$this->dispatch('myEvento', producto: $this->producto, cantidad: $this->cantidad);
    }
}
