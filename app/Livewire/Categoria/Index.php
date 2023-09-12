<?php

namespace App\Livewire\Categoria;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Categoria;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;

    protected $rules = [
        'name' => 'required|unique:categorias'
    ];
    protected $messages = [
        'name.required' => 'Escriba una categoría.',
        'name.unique' => 'Ya existe esa categoría.',
    ];
    public function render()
    {
        return view('livewire.categoria.index', [
            'categorias' => Categoria::paginate(10),
        ]);
    }

    public function save()
    {

        $this->validate();

        \App\Models\Categoria::create([
            'name' => $this->name,
        ]); 

        session()->flash('message', 'Categoría creada correctamente.');
    }

    public function delete(Categoria $categoria) 
    {
        $categoria->delete();
        session()->flash('message', 'Categoría eliminada correctamente.');
    }

    public function edit($id)
    {
        $this->validate();

        $update = Categoria::find($id)->update([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Categoría actualizada correctamente.');
    }
}
