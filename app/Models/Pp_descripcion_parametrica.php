<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pp_descripcion_parametrica extends Model
{
    use HasFactory;

    protected $primaryKey = 'pk_id_descripcion_parametrica';

    /**
     * @var array
     */
    protected $fillable = ['fk_id_parametrica', 'codigo', 'descripcion', 'activo', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Pp_Parametrica()
    {
        return $this->belongsTo('App\PpParametrica', 'fk_id_parametrica', 'pk_id_parametrica');
    }
}
