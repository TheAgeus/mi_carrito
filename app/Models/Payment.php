<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'id_movimiento',
        'id_usuario',
        'monto',
        'address',
        'estado'
    ];


    public function cantidad_total() 
    {
        $Productos = Item::where('pago_id', $this->id)->get();
        $cantidad = 0;
        foreach ($Productos as $producto) {
            $cantidad = $cantidad + $producto->cantidad;
        }
        return $cantidad;
    }

    public function fecha() 
    {
        $array_fecha_hora = $this->created_at->format('d/m/Y');
        return $array_fecha_hora;
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'pago_id');
    }

}
