<?php

namespace App\Livewire\Producto;

use Livewire\Component;
use Livewire\WithPagination;

use \App\Models\Producto;
use \App\Models\Categoria;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

use App\Exports\ProductosExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Storage;
 


class Index extends Component
{

    public $name;
    public $precio_mx;
    public $stock;
    public $codigo;
    public $categoria_id;
    public $img;
    public $codigo_proveedor;
    public $proveedor;
    public $precio_proveedor;

    public $edit_name;
    public $edit_precio_mx;
    public $edit_stock;
    public $edit_codigo;
    public $edit_categoria_id;
    public $edit_img;
    public $edit_img_old;
    public $edit_codigo_proveedor;
    public $edit_proveedor;
    public $edit_precio_proveedor;

    public $producto_id;

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|unique:productos',
        'precio_mx' => 'required',
        'stock' => 'required',
        'img' => 'image|mimes:jpeg,png,jpg|max:2048',
        'categoria_id' => 'required',
        'codigo_proveedor' => 'required',
        'proveedor' => 'required',
        'precio_proveedor' => 'required'
        
    ];

    protected $messages = [
        'name.required' => 'Escriba un nombre de producto.',
        'name.unique' => 'Ya existe ese producto.',
        'precio_mx.required' => 'Escriba un precio',
        'stock.required' => 'Escriba un stock',
        'img.image' => 'Suba un archivo de imagen jpeg, png o jpg',
        'img.max' => 'El archivo debe ser menor a 2mb',
        'categoria_id.required' => 'Seleccione una categoría',
        'codigo_proveedor.required' => 'Escriba un código del proveedor',
        'proveedor.required' => 'Escriba un proveedor',
        'precio_proveedor' => 'Escriba un precio de proveedor'
    ];


    public function render()
    {
        return view('livewire.producto.index', [
            'productos' => Producto::paginate(10),
            'categorias' => Categoria::all(),
        ]);
    }


    public function loadEditData(Producto $producto)
    {

        $this->producto_id = $producto->id;
        $this->edit_name = $producto->name;
        $this->edit_precio_mx = $producto->precio_mx;
        $this->edit_stock = $producto->stock;
        $this->edit_codigo_proveedor = $producto->codigo_proveedor;
        $this->edit_proveedor = $producto->proveedor;
        $this->edit_precio_proveedor = $producto->precio_proveedor;
        $this->edit_categoria_id = $producto->categoria_id;
        $this->edit_img_old = $producto->img_path;
    }

    public function update()
    {

        $update = \App\Models\Producto::find($this->producto_id);

        if($this->edit_img) 
        {
            // Borrar la imagen anterior
            File::delete(public_path() . '/storage/images/productos/' . $this->edit_img_old);
            
            // Guardar la nueva imagen
            Storage::disk('public')->putFileAs('/images/productos', $this->edit_img, $this->producto_id . '.' . $this->edit_img->extension());
            $img_name = $this->producto_id . '.' . $this->edit_img->extension();
            $image = $this->edit_img;

        }
        else 
        {
            $img_name = $update->img_path;
        }


        $update->update([
            'name' => $this->edit_name,
            'precio_mx' => $this->edit_precio_mx,
            'stock' => $this->edit_stock,
            'categoria_id' => $this->edit_categoria_id,
            'codigo_proveedor' => $this->edit_codigo_proveedor,
            'proveedor' => $this->edit_proveedor,
            'precio_proveedor' => $this->edit_precio_proveedor,
            'img_path' => $img_name,
        ]);

        session()->flash('message', 'Producto editado correctamente.');
    }

    public function save($usuario_id)
    {
        $this->validate();

        Storage::disk('public')->putFileAs('/images/productos', $this->img, $this->producto_id . '.' . $this->img->extension());
        $img_name = $this->producto_id . '.' . $this->img->extension();
        $image = $this->img;

        \App\Models\Producto::create([
            'name' => $this->name,
            'precio_mx' => $this->precio_mx,
            'stock' => $this->stock,
            'usuario_id' => $usuario_id,
            'categoria_id' => $this->categoria_id,
            'codigo_proveedor' => $this->codigo_proveedor,
            'proveedor' => $this->proveedor,
            'precio_proveedor' => $this->precio_proveedor,
            'img_path' => $img_name,
        ]);

        session()->flash('message', 'Producto creado correctamente.');
    }

    public function delete(Producto $producto)
    {
        // Borrar la imagen del almacenamiento
        File::delete(public_path() . '/storage/images/productos/' . $producto->img_path);

        $producto->delete();
        session()->flash('message', 'Producto borrado correctamente.');

    }

    public function exportar()
    {   
        return Excel::download(new ProductosExport, 'productos.xlsx');
    }
}
