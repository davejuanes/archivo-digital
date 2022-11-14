<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $primaryKey = 'pk_id_documento';

    protected $fillable = [
        'codigo',
        'contenido',
        'fecha_inicio',
        'fecha_fin',
        'fkp_estado',
        'fk_id_cliente',
        'activo',
        'fk_user'
    ];

    public function Cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'fk_id_cliente', 'pk_id_cliente');
    }
}
