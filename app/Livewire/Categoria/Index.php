<?php

namespace App\Livewire\Categoria;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Categoria;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $name;
    public $img;

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

        $categoria =  Categoria::find($id);

        if ($categoria->name == $this->name){
            $this->validate();
        }

        if ($this->img != NULL and $this->name != Null) { // Si se quiere actualizar ambas cosas
            
            $categoria->update([
                'name' => $this->name,
                'img_path' => $id . '.' . $this->img->extension()
            ]);
           
            // Guardas la imagen
            Storage::disk('public')->putFileAs('/images/categorias', $this->img, $id . '.' . $this->img->extension());
        }
        else if($this->name != Null) { // Si se quiere actualizar solo el nombre
            $update = Categoria::find($id)->update([
                'name' => $this->name,
            ]);
        }
        elseif($this->img != NULL) { // Si se quiere actualizar solo la imagen
            $categoria->update([
                'img_path' => $id . '.' . $this->img->extension()
            ]);
           
            // Guardas la imagen
            Storage::disk('public')->putFileAs('/images/categorias', $this->img, $id . '.' . $this->img->extension());
        }

        
        session()->flash('message', 'Categoría actualizada correctamente.');
    }
}
