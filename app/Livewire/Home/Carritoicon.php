<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Livewire\Attributes\On;


use \App\Models\Producto;
use \App\Models\UsuarioCarrito;


class Carritoicon extends Component
{

    public $cantidad;
    public $carrito;

    #[On('updateCart')]
    public function selfUpdateCart($user_id)
    {
        $carrito = UsuarioCarrito::where('usuario_id', $user_id)->get();
        if (count($carrito) == 0)
        {
            $this->cantidad = 0;
        }
        else 
        {
            $cantidad = 0;
            foreach($carrito as $item)
            {
                $cantidad += $item->cantidad;
                $this->cantidad = $cantidad;
            }

        }
        $this->render();
    }

    public function mount($usuario_id)
    {

        $carrito = UsuarioCarrito::where('usuario_id', $usuario_id)->get();
        if (count($carrito) == 0)
        {
            $this->cantidad = 0;
        }
        else 
        {
            $cantidad = 0;
            foreach($carrito as $item)
            {
                
                $cantidad += $item->cantidad;
                $this->cantidad = $cantidad;
            }
        }
        $this->render();

    }

    public function render()
    {
        return view('livewire.home.carritoicon');
    }
}
