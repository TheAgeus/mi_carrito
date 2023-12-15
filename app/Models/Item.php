<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;
    protected $table = 'pago_items';
    public $timestamps = false;
    protected $fillable = [
        'pago_id',
        'productoName',
        'cantidad',
        'precio',
    ];

    public function producto() : HasOne
    {
        return $this->hasOne(Producto::class, 'name', 'productoName');
    }
}
