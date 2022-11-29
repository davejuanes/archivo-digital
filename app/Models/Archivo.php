<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $primaryKey = 'pk_id_archivo';

    protected $fillable = [
        'codigo_archivador',
        'ubicacion',
        'fkp_tipo_documento',
        'fkp_estado_documento',
        'ruta',
        'fecha_archivo',
        'activo',
        'fk_user',
        'fk_id_cliente',
        'fk_id_documento',
    ];

    public function Cliente()
    {
        return $this->belongsTo('App\Cliente', 'fk_id_cliente', 'pk_id_cliente');
    }

    public function Documento()
    {
        return $this->belongsTo('App\Documento', 'fk_id_documento', 'pk_id_documento');
    }
}
