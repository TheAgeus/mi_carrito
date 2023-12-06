<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'id_movimiento',
        'id_usuario',
        'monto',
        'address',
    ];
}
