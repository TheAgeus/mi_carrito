<?php

namespace App\Livewire\Home;

use Livewire\Component;
use \App\Models\Producto;
use \App\Models\Categoria;
use Livewire\Attributes\On;

class Homeproductos extends Component
{

    public $categoria_id;
    public $title;

    public function mount()
    {
        $this->categoria_id = NULL;
        $this->title = "Todas las categorías";
    }


    public function render()
    {
        if($this->categoria_id == NULL or $this->categoria_id == -1){
            return view('livewire.home.homeproductos', ['productos' => Producto::all()]);
        }
        else
        {
            $this->title = Categoria::find($this->categoria_id)->name;
        }
        return view('livewire.home.homeproductos', [
            'productos' => Producto::where('categoria_id', $this->categoria_id)->get()
        ]);
    }

    #[On('showCat')] // mostrar solo los de esa categoria
    public function categoriaSelected($id)
    {   
        $this->categoria_id = $id;

        if($id != NULL and $id != -1)
        {
            $this->title = Categoria::find($id)->name;
        }
        else
        {
            $this->title = "Todas las categorías";
        }
        $this->render();
    }


}
