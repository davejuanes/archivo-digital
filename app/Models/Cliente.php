<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'pk_id_cliente';

    protected $fillable = [
        'nombre',
        'numero_ci',
        'numero_telefono',
        'email',
        'direccion',
        'activo',
        'fk_user',
    ];
}
