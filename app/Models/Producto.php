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
        'descripcion',
    ];

    public function average_score()
    {   
        $current_id = $this->id;

        $all_rates = Comentario::where('producto_id', $current_id)->get('calificacion');

        if(count($all_rates) > 0){
            $sumatoria = 0;
            $contador = 0;
    
            foreach ($all_rates as $rate) {
                $sumatoria = $sumatoria + $rate->calificacion;
                $contador = $contador + 1;
            }
    
            $total = $sumatoria / $contador;
    
            return (int)round($total);
        }
        return 0;

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
