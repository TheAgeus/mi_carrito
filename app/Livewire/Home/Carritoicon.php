<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Livewire\Attributes\On;


use \App\Models\Producto;


class Carritoicon extends Component
{
    public $productos = array();
    public $cantidades = array();


    #[On('myEvento')]
    public function selfUpdateCart($producto, $cantidad)
    {
        if ($cantidad == NULL){
            return;
        }
        array_push($this->productos, $producto);
        array_push($this->cantidades, $cantidad);
    }

    public function mount()
    {
        $this->productos = array();
        $this->cantidades = array();
    }

    public function render()
    {
        return view('livewire.home.carritoicon');
    }
}
