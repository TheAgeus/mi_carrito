<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
