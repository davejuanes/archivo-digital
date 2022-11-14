<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    use HasFactory;

    protected $primaryKey = 'pk_id_biblioteca';

    protected $fillable = [
        'numero_normativa',
        'descripcion',
        'ruta',
        'fecha_promulgacion',
        'fkp_tipo_normativa',
        'fkp_estado',
        'activo',
        'fk_user',
    ];
}
