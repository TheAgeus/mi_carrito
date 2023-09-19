<?php

namespace App\Livewire\Home;

use Livewire\Component;
use \App\Models\Producto;
use Livewire\Attributes\On;

class Homeproductos extends Component
{

    public $categoria_id;

    public function mount()
    {
        $this->categoria_id = NULL;
    }


    public function render()
    {
        if($this->categoria_id == NULL or $this->categoria_id == -1){
            return view('livewire.home.homeproductos', ['productos' => Producto::all()]);
        }
        return view('livewire.home.homeproductos', ['productos' => Producto::where('categoria_id', $this->categoria_id)->get()]);
    }

    #[On('showCat')] // mostrar solo los de esa categoria
    public function categoriaSelected($id)
    {
        $this->categoria_id = $id;
        $this->render();
    }

}
