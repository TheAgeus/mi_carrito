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
       
        if ($this->cantidad == NULL) {
            $this->dispatch('alertProduct', msg:'No colocó cantidad', type: 'bg-warning');
            return;
        }

        $selfItemAmount = UsuarioCarrito::where('usuario_id', $user_id)->where('producto_id', $this->producto->id)->sum('cantidad');

        if ( $this->cantidad + $selfItemAmount > $this->producto->stock ) {
            $this->dispatch('alertProduct', msg:'El stock es insuficiente para la cantidad que requiere comprar, pruebe otra cantidad', type: 'bg-danger');
            return;
        }

        UsuarioCarrito::create([
            'usuario_id' => $user_id,
            'producto_id' => $this->producto->id,
            'cantidad' => $this->cantidad
        ]);

        $this->dispatch('updateCart', user_id: $user_id);
        $this->dispatch('alertProduct', msg: 'Se han añadido ' . $this->cantidad . ' ' . $this->producto->name, type: 'bg-success');
    }
}
