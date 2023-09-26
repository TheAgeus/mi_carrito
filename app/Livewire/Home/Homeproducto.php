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
       
        $selfItemAmount = UsuarioCarrito::where('usuario_id', $user_id)->sum('cantidad');

        if ( $this->cantidad + $selfItemAmount > $this->producto->stock ) {
            session()->flash('errorToModal', 'El stock es insuficiente para la cantidad que requiere comprar, pruebe otra cantidad');
            return;
        }

        UsuarioCarrito::create([
            'usuario_id' => $user_id,
            'producto_id' => $this->producto->id,
            'cantidad' => $this->cantidad
        ]);

        $this->dispatch('updateCart', user_id: $user_id);
        //$this->dispatch('myEvento', producto: $this->producto, cantidad: $this->cantidad);
    }
}
