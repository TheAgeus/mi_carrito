<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'precio_mx',
        'codigo',
        'stock',
        'usuario_id',
        'codigo_proveedor',
        'proveedor',
        'precio_proveedor',
        'categoria_id',
        'img_path',
    ];

    public function average_score()
    {
        return 5;
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
