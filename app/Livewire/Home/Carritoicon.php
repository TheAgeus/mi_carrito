<?php

namespace App\Livewire\Home;

use Livewire\Component;
use \App\Models\Producto;

class Carritoicon extends Component
{
    public $productos = array();

    protected $listeners = ['addToCart' => 'selfUpdateCart'];


    public function selfUpdateCart(Producto $producto)
    {
        array_push($this->productos, $producto);
        dd($this->productos);
        return view('livewire.home.carritoicon');
    }

    public function mount()
    {
        $this->productos = array();
    }

    public function render()
    {
        return view('livewire.home.carritoicon');
    }
}
