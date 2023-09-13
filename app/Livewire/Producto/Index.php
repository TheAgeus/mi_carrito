<?php

namespace App\Livewire\Producto;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Producto;
use \App\Models\Categoria;

use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class Index extends Component
{

    public $name;
    public $precio_mx;
    public $stock;
    public $codigo;
    public $categoria_id;
    public $img;

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|unique:productos',
        'precio_mx' => 'required',
        'stock' => 'required',
        'codigo' => 'required',
        'img' => 'image|mimes:jpeg,png,jpg|max:2048',
        'categoria_id' => 'required',
        
    ];

    protected $messages = [
        'name.required' => 'Escriba un nombre de producto.',
        'name.unique' => 'Ya existe ese producto.',
        'precio_mx.required' => 'Escriba un precio',
        'stock.required' => 'Escriba un stock',
        'codigo.required' => 'Escriba un codigo',
        'img.image' => 'Suba un archivo de imagen jpeg, png o jpg',
        'img.max' => 'El archivo debe ser menor a 2mb'
    ];


    public function render()
    {
        return view('livewire.producto.index', [
            'productos' => Producto::paginate(10),
            'categorias' => Categoria::all(),
        ]);
    }

    public function save($usuario_id)
    {
        $this->validate();

        $img_name = time() . '-' . $this->name . '.' . $this->img->extension();

        $destination_path = 'public/images/productos';
        $image = $this->img;
        $path = $this->img->storeAs($destination_path, $img_name);

        \App\Models\Producto::create([
            'name' => $this->name,
            'precio_mx' => $this->precio_mx,
            'codigo' => $this->codigo,
            'stock' => $this->stock,
            'usuario_id' => $usuario_id,
            'categoria_id' => $this->categoria_id,
            'img_path' => $img_name,
        ]);

        session()->flash('message', 'Producto creado correctamente.');
    }
}
